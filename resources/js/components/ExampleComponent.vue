<template>
    <div class="">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            currentPath:{
                type:String,
            },
        },
        mounted() {
            console.log(this.currentPath)
        },
    }
</script>
