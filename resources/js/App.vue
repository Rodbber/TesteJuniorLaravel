<template>
  <div>
    <header>
      <div class="flex justify-center">
        <nav class="self-center w-full max-w-7xl">
          <div class="flex flex-col lg:flex-row justify-around items-center">
            <ul
              class="hidden lg:flex items-center text-[18px] font-semibold pl-32"
            >
              <li
                class="hover:underline underline-offset-4 decoration-2 decoration-white py-2 rounded-lg px-5"
              >
                <a href="#" @click.prevent="() => $router.push('/unidade')">Unidades</a>
              </li>
              <li
                class="hover:underline underline-offset-4 decoration-2 decoration-white py-2 rounded-lg px-5"
              >
                <a href="#" @click.prevent="() => $router.push('/colaborador')">Colaboradores</a>
              </li>
            </ul>
            <div class="text-center text-base pr-5 inline-flex">
              <a
                href="https://www.linkedin.com/in/rodrigo-barbosa-bertini/"
                target="_blank"
                class="w-8 h-8 inline-block rounded-full pt-[5px] hover:text-blue-500"
                ><i class="fa fa-linkedin"></i
              ></a>
              <a
                href="https://www.github.com/rodbber"
                target="_blank"
                class="w-8 h-8 inline-block rounded-full pt-[5px] hover:text-blue-500"
                ><i class="fa fa-github" aria-hidden="true"></i></a>
                <a
                href="https://rodbber.github.io"
                target="_blank"
                class="w-8 h-8 inline-block rounded-full pt-[5px] hover:text-blue-500"
                ><i class="fa fa-info-circle" aria-hidden="true"></i></a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <router-view></router-view>
  </div>
</template>

<script>
export default {};
</script>
