<template>
    <div>
        <div class="product-filter">
            <div class="row">
                <div class="col-md-4 col-sm-5">
                    <div class="btn-group">
                        <!--<button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>-->
                        <!--<button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>-->
                    </div>
                </div>
                <div class="col-sm-2 text-right">
                    <label class="control-label" for="input-sort">مرتب سازی :</label>
                </div>
                <div class="col-md-3 col-sm-2 text-right">
                    <select id="input-sort" class="form-control col-sm-3" v-model="sort" @change="getSortedProduct()">
                        <!--<option value="" selected="selected">پیشفرض</option>-->
                        <!--<option value="">نام (الف - ی)</option>-->
                        <!--<option value="">نام (ی - الف)</option>-->
                        <option value="ASC">قیمت (کم به زیاد)</option>
                        <option value="DESC">قیمت (زیاد به کم)</option>
                        <!--<option value="">امتیاز (بیشترین)</option>-->
                        <!--<option value="">امتیاز (کمترین)</option>-->
                        <!--<option value="">مدل (A - Z)</option>-->
                        <!--<option value="">مدل (Z - A)</option>-->
                    </select>
                </div>
                <div class="col-sm-1 text-right">
                    <label class="control-label" for="input-limit">نمایش :</label>
                </div>
                <div class="col-sm-2 text-right">
                    <select id="input-limit" class="form-control" v-model="paginate" @change="getSortedProduct()">
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
        </div>
        <br />
        <div class="row products-category">
            <div v-for="product in products.data"  class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="product-thumb clearfix">
                    <div class="image"><a :href="'http://egreen.test/products/' + product.slug"><img
                            :src="'http://egreen.test' + product.photos[0].path" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه"
                            class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a :href="'http://egreen.test/products/' + product.slug">{{product.title}}</a>
                        </h4>

                        <p v-if="product.discount_price" class="price"><span class="price-new">{{product.discount_price}} تومان</span>
                            <span class="price-old">{{product.price}} تومان</span>
                            <span class="saving">{{Math.round(Math.abs((product.price-product.discount_price)/product.price * 100))}}%</span>
                        </p>

                        <p v-if="!product.discount_price" class="price"> {{product.price}} تومان </p>

                    </div>
                    <div class="button-group">
                        <!--<a class="btn-primary" v-if="product.status === 1 || product.stock !== 0" :href="'http://egreen.test/add-to-cart/' + product.id"><span>افزودن به سبد</span></a>-->
                        <a :href="'http://egreen.test/products/' + product.slug"   class="btn-primary">مشاهده محصول</a>
                        <!--<a class="btn-primary" :href="'http://egreen.test/add-to-cart/' + product.id"><span>افزودن به سبد</span></a>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="products.last_page">
            <div class="col-sm-12 text-center">
                <paginate
                        v-model="page"
                        :page-count="products.last_page"
                        :page-range="3"
                        :margin-pages="2"
                        :click-handler="clickCallback"
                        :prev-text="'قبلی'"
                        :next-text="'بعدی'"
                        :container-class="'pagination'"
                        :page-class="'page-item'">
                </paginate>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: [],
                sort: 'DESC',
                page: 1,
                paginate: 10,
            }
        },
        props: ['category'],
        mounted(){
          axios.get('/api/products/' + this.category.id).then(res =>{
              this.products = res.data.products
              console.log(this.products)
          }).catch(err =>{
              console.log(err)
          })
        },
        methods: {
            clickCallback: function(pageNum) {
                this.products = [];
                if (this.sort === "ASC" || this.sort === "DESC"){
                    this.getSortedProduct()
                } else {
                    axios.get('/api/products/' + this.category.id + '?page=' + pageNum).then(res =>{
                        this.products = res.data.products
                        console.log(this.products)
                    }).catch(err =>{
                        console.log(err)
                    })
                }
            },
            getSortedProduct: function () {
                this.products = [];
                axios.get('/api/sort-products/' + this.category.id + '/' + this.sort + '/' + this.paginate + '?page='+ this.page).then(res =>{
                    this.products = res.data.products
                    console.log(this.products)
                }).catch(err =>{
                    console.log(err)
                })
            },

            // getPaginateProducts: function () {
            //     this.products = [];
            //     axios.get('/api/sort-products/' + this.category.id + '/' + this.sort +'?page='+ this.page).then(res =>{
            //         this.products = res.data.products
            //         console.log(this.products)
            //     }).catch(err =>{
            //         console.log(err)
            //     })
            // }
        }
    }
</script>
