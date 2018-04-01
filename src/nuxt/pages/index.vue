<template>
  <div> {{data}} </div>
</template>
<script>
export default{
  async asyncData({app}){
    const data = await app.$axios.$get('http://172.20.0.6/api')
    return {data};
  }
}
</script>
