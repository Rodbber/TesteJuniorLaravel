<template>
  <div>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <button
          class="inline-block rounded-lg bg-gray-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-gray-600 focus-visible:ring active:bg-gray-700 md:text-base"
          @click="() => $router.go(-1)"
        >
          Voltar
        </button>
        <div class="mb-10 md:mb-16">
          <h2
            class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl"
          >
            Adicionando novo colaborador
          </h2>
        </div>
        <div class="flex justify-center">
          <span v-if="error" v-html="error" class="text-red-500"></span>
          <span v-if="success" class="text-green-500">Sucesso</span>
        </div>
        <form
          @submit.prevent="submit"
          class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2"
        >
          <div class="sm:col-span-2">
            <label
              for="colaborador"
              class="mb-2 inline-block text-sm text-gray-800 sm:text-base"
              >Nome*</label
            >
            <input
              v-model="form.nome"
              name="colaborador"
              class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
            />
          </div>
          <div class="sm:col-span-2">
            <label
              for="cpf"
              class="mb-2 inline-block text-sm text-gray-800 sm:text-base"
              >CPF*</label
            >
            <input
              v-model="form.cpf"
              name="cpf"
              class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
            />
          </div>

          <div class="sm:col-span-2">
            <label
              for="email"
              class="mb-2 inline-block text-sm text-gray-800 sm:text-base"
              >E-mail*</label
            >
            <input
              v-model="form.email"
              name="email"
              type="text"
              class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
            />
          </div>

          <model-select
            :isError="selectUnidadeError"
            :options="unidades"
            v-model="form.unidade_id"
            placeholder="Selcione uma unidade"
            @blur="verificaUnidade"
          >
          </model-select>
          <model-select
            :isError="selectCargoError"
            :options="cargos"
            v-model="form.cargo_id"
            placeholder="Selcione um cargo"
            @blur="verificaCargo"
          >
          </model-select>

          <div>
            <div>
              <label
                for="email"
                class="mb-2 inline-block text-sm text-gray-800 sm:text-base"
                >Nota de desempenho*</label
              >
            </div>
            <div class="flex">
                <div
              v-for="(i, index) in 10"
              :key="index"
              @click="form.nota_desempenho = Number(i + 1)"
              class="cursor-pointer"
            >
              <i
                v-if="
                  form.nota_desempenho < Number(i) + 1 ||
                  form.nota_desempenho == null
                "
                class="fa fa-star-o"
                aria-hidden="true"
              ></i>
              <i v-else class="fa fa-star" aria-hidden="true"></i>
            </div>
            </div>
          </div>

          <div class="flex items-center justify-between sm:col-span-2">
            <button
              class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base"
            >
              Send
            </button>

            <span class="text-sm text-gray-500">* Obrigatório</span>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import "vue-search-select/dist/VueSearchSelect.css";
import { ModelSelect, ModelListSelect } from "vue-search-select";

export default {
  components: { ModelSelect, ModelListSelect },
  data() {
    return {
      form: this.formClean(),
      error: null,
      success: null,
      unidades: [],
      cargos: [],
      selectCargoError: false,
      selectUnidadeError: false,
    };
  },
  created() {
    this.getdata();
  },
  methods: {
    verificaCargo() {
      setTimeout(() => {
        if (!this.form.cargo_id) {
          this.selectCargoError = true;
        } else {
          this.selectCargoError = false;
        }
      }, 100);
    },
    verificaUnidade() {
      setTimeout(() => {
        if (this.form.unidade_id == null) {
          this.selectUnidadeError = true;
        } else {
          this.selectUnidadeError = false;
        }
      }, 100);
    },
    getUnidades() {
      axios
        .get("/unidades")
        .then((r) => {
          this.unidades = r.data.map((v) => {
            return { value: v.id, text: v.nome_fantasia };
          });
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getCargos() {
      axios
        .get("/cargos")
        .then((r) => {
          this.cargos = r.data.map((v) => {
            return { value: v.id, text: v.cargo };
          });
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getdata() {
      this.getUnidades();
      this.getCargos();
    },
    formClean() {
      return {
        nome: null,
        cpf: null,
        email: null,
        cargo_id: null,
        unidade_id: null,
        nota_desempenho: null,
      };
    },
    submit() {
      /* console.log(this.form);
      return; */
      axios
        .post("/colaborador", this.form)
        .then((r) => {
          this.form = this.formClean();
          this.success = "Cadastro realizado com sucesso";
          if (this.error) {
            this.error = null;
          }
        })
        .catch((e) => {
          if (this.success) {
            this.success = null;
          }
          if (e.response.errors) {
            let errors = e.response.errors;
            if (Object.keys(errors).length) {
              for (let i in errors) {
                this.error = `<ul>${e.response.errors.join(
                  `<li>${errors[i]}</li>`
                )}</ul>`;
              }
            } else {
              this.error = `${e.response.errors.join(
                `<li>- ${errors[i]}</li>`
              )}`;
            }
          } else if (e.response.data.errors) {
            let errors = e.response.data.errors;
            if (Object.keys(errors).length) {
              this.error = "<ul>";
              for (let i in errors) {
                this.error += `<li> - ${errors[i]}</li>`;
              }
              this.error += "</ul>";
            } else {
              this.error = `${e.response.errors.join(
                `<li>- ${errors[i]}</li>`
              )}`;
            }
          }
          if (!this.error) {
            this.error = "- Ocorreu um erro inesperado";
          }
        });
    },
  },
};
</script>
