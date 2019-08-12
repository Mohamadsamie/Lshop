<template>
    <div>
        <div class="form-group">
            <label>دسته بندی</label>
            <select name="categories[]"  class="form-control" multiple>
                <option v-for="category in categories" :value="categories.id">{{category.name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label>برند</label>
            <select name="brand"  class="form-control">
                <option v-for="brand in brands" :value="brand.id">{{brand.title}}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: []
            }
        },
        props: ['brands'],
        mounted() {
            axios.get('/api/categories').then(res =>{
                this.getAllChildren(res.data.categories, 0)
            }).catch(err=>{
              console.log(err)
            })
        },
        methods: {
            getAllChildren: function (currentValue, level) {
                for (var i=0; i < currentValue.length; i++) {
                    var current = currentValue[i];
                    this.categories.push({
                        id: current.id,
                        name:   Array(level + 1).join("----") + " " + current.name
                    })
                    if (current.children_recursive && current.children_recursive.length > 0){
                        this.getAllChildren(current.children_recursive, level + 1)
                    }
                }
            }
        }
    }
</script>
