 
<template>
  <div>
      <h1>Your Item</h1>
      <hr>
      <div class="row">
          <div class="col-md-3">
              <h4>Your Product</h4>
             
                  <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="myImage" accept="image/*" v-on="course.image" class="form-control">
                </div>
                  <div class="mb-3">
                    <label for="category">Category</label>
                    <!-- <select id="category" name="category"> -->
                    <select input type="text" v-model="course.category" class="form-control">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                    <option value="audi">Nichan</option>
                    <option value="audi">Damn</option>
                    </select>
                </div>
                <div class="mb-3">
                      <label for="product_name">Product Name</label>
                      <input type="text" v-model="course.product_name" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="price">Price</label>
                      <input type="text" v-model="course.price" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="description">Description</label><br>
                  <textarea rows="8" cols="38" v-model="course.description" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-sm btn-success" @click="submitItem">Add Item</button>
              <form action="/action_page.php">
            </form>
            &nbsp;
          </div>
          <div class="col-md-9">
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>...</th>
                    </tr>   
                </thead>
                <tbody>
                    <tr v-for="course in shops" :key="course.id">
                        <!-- <div class="col-md-9 row">
                        <img :src="'/storage/images/' + course.image"/>
                        <img src="data:image/jpeg;base64,'.base64_encode( $imageBlob ).'"/>
                        </div> -->
                        <td>{{course.image}}</td>
                        <td>{{course.category}}</td>
                        <td>{{course.product_name}}</td>
                        <td>{{course.price}}</td>
                        <td>{{course.description}}</td>
                        <td>
                            <router-link :to="{name: 'ViewCourse', params: {id:course.id}}"
                                class="btn btn-success btn-sm"
                            >
                                Open
                            </router-link>
                        </td>

                    </tr>
                </tbody>
            </table>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            
            shops: [
            ],
            course: {
            },
        }
    },
    methods: {
            getData() {
                fetch('http://127.0.0.1:8000/api/shops')
                .then(res => res.json())
                .then(data => this.shops = data.shops)
                .catch(err => console.log(err))
            },
            
            submitItem() {
            fetch('http://127.0.0.1:8000/api/shops',{
                method: 'post',
                headers: {
                    "Content-Type": "application/json"
                },
                credentials: "same-origin",
                body: JSON.stringify(this.hops)
            })
              .then(res => res.json())
              .then(data => {
                  this.shops.unshift(data)
                  this.shops = {}
              })
              .catch(err=>console.log(err))
            }
    },
        mounted() {
            this.getData()  
        }
}
</script>

<style>
.card{
    width: fit-content;
    height: fit-content;
}
</style>