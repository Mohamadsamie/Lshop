<template>
    <div>
        <div class="form-group">
            <label>دسته بندی</label>
            <select name="categories[]"  class="form-control" multiple v-model="categories_selected" @change="onChange($event)">
                <option v-for="category in categories" :value="category.id">{{category.name}}</option>
            </select>
        </div>
            <div class="form-group">
                <label>برند</label>
                <select name="brand"  class="form-control">
                    <option v-for="brand in brands" :value="brand.id">{{brand.title}}</option>
                </select>
            </div>
        <div v-if="flag">
            <div class="form-group" v-for="attribute in attributes">
                <label>ویژگی {{attribute.title}}</label>
                <select name="attribute" class="form-control">
                    <option  v-for="attributeValue in attribute.attributes_value" :value="attributeValue.id">{{attributeValue.title}}</option>
                </select>
            </div>
        </div>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                categories:[],
                categories_selected:[],
                flag: false,
                attributes:[]
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
            },
            onChange: function (event) {
                this.flag = false;
                axios.post('/api/categories/attribute', this.categories_selected).then(res => {
                    this.attributes = res.data.attributes
                    this.flag = true
                }).catch(err => {
                    console.log(err)
                    this.flag = false
                })
            }
        }

    }
</script>
