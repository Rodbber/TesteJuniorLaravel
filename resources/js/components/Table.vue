<template>
  <div>
    <table>
      <thead>
        <slot name="table-head"></slot>
      </thead>
      <tbody>
        <slot name="table-body"></slot>
      </tbody>
    </table>
    <div class="flex justfy-end">
      <div>
        <button><</button>
        <button>></button>
      </div>
    </div>
  </div>
</template>
