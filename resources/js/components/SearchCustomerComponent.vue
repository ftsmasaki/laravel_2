<template>
    <div class="">
        <!-- v-modelで変数と入力値を同期させる -->
        <input v-model="condition" class="form-control filter" type="text" placeholder="filter">
        <div class="list-group">
            <!-- v-forで条件に合致したタスクを繰り返し表示する -->
            <div v-for="customer in matched" :key="customer.id"
                 class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ customer.customer_name }}</h5>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchCustomerComponent.vue",
        data: function () {
            return {
                condition: null, //フィルタ条件
                customers: [] //タスクの配列
            }
        },
        created() {
            //インスタンス生成時にapiからタスク一覧を取得して変数に格納
            axios.get('/api/search_customer').then(response => {
                this.customers = response.data
            })
        },
        computed: {
            matched: function () {
                //conditionの値が変更されると自動的に呼び出される
                return this.customers.filter(function (element) {
                    //タイトルにcondionの値を含むものでフィルタ
                    return !this.condition || element.customer_name.indexOf(this.condition) !== -1
                }, this)
            }
        }
    }
</script>

<style scoped>
    .filter {
        margin: 1em 0em;
    }
</style>
