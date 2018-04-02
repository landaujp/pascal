<template>
  <div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header">
                    ユーザー一覧
                </div>
                <div class="list-group list-group-flush">
                    <ul>
                        <li>ishino</li>
                        <li>egami</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
        </div>
    </div>
</div>
</template>
<script>
export default{
  async asyncData({app}){
    const data = await app.$axios.$get('http://172.20.0.6/api')
    return {data};
  }
}
</script>
