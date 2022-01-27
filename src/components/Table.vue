<template>
  <table>
    <thead :data-aos-duration="500" data-aos="fade-right">
    <tr>
      <td v-for="(item, index) in titles" :key="index">{{ item }}</td>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(column, index) in columns" :key="index" :data-aos-duration="500" data-aos="fade-right">
      <td style="min-width:100px">{{ column.item }}</td>
      <td :colspan="column.memo=='-'?'2':'1'">{{ column.text }}</td>
      <td v-if="column.memo!='-'">{{ column.memo }}</td>
    </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "table-el",
  props: {
    titles: {
      type: Array,
      default: []
    },
    columns: {
      type: Array,
      default: [{}]
    }
  }
}
</script>
