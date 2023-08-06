<template>
  <div class="flex justify-center">
    <div>
      <div class="text-center">
        <h1>Colaboradores - {{ dataTable.length }}</h1>
      </div>
      <div class="flex justify-between">
        <div>
          <a
            href="/relatorio/colaborador"
            class="h-8 px-5 m-2 text-black transition-colors duration-150 bg-white border-2 border-red-500 rounded-lg focus:shadow-outline hover:bg-red-100"
          >
            Relatorio
          </a>
          <a
            href="/relatorio/colaborador/ranking"
            class="h-8 px-5 m-2 text-black transition-colors duration-150 bg-white border-2 border-red-500 rounded-lg focus:shadow-outline hover:bg-red-100"
          >
            Ranking
          </a>
        </div>
        <button
          class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
          @click="() => $router.push('/colaborador/register')"
        >
          Adicionar
        </button>
      </div>
      <table class="w-[800px]">
        <thead style="width: calc(100% - 1em)">
          <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Unidade</th>
            <th>Cargo</th>
          </tr>
        </thead>
        <tbody class="block h-[50vh] overflow-auto">
          <tr v-for="data in dataTable" :key="data.id" class="text-center">
            <td>
              {{ data.nome }}
            </td>
            <td>
              {{ data.cpf }}
            </td>
            <td>
              {{ data.unidade.nome_fantasia }}
            </td>
            <td>
              {{ data.cargo.cargo }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style>
thead,
tbody tr {
  display: table;
  width: 100%;
  table-layout: fixed;
}
table,
th,
td {
  border: 1px solid;
}

table {
  border-collapse: collapse;
}

td {
  padding: 1rem;
}
</style>

<script>
export default {
  data() {
    return {
      dataTable: [],
      page: 1,
      perpage: 10,
    };
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
      axios.get("/colaboradores").then((r) => {
        this.dataTable = r.data;
      });
    },
  },
};
</script>
