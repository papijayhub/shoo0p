<template>
  <h1>Course Details</h1>
  <hr>
  <div class="row">
      <div class="col-md-7">
          <h1>Course Details</h1>
          <table class="table table-striped">
              <tr>
                  <th>ID</th><td>{{course.id}}</td>
                  </tr>
                  <tr>
                      <th>Code</th><td>{{course.code}}</td>
                  </tr>
                  <tr>
                      <th>Course No</th><td>{{course.course_no}}</td>
                  </tr>
                  <tr>
                      <th>Description</th><td>{{course.description}}</td>
                  </tr>
                  <tr>
                      <th>Instructor</th><td>{{course.instructor}}</td>
                  </tr>
                  <tr>
                      <th>Room</th><td>{{course.room}}</td>
                  </tr>
          </table>

          <tr>
                <button class="btn btn-sm btn-warning" margin="50px" @click="toggleEditor">
                    {{editor.label}}
                </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-sm btn-danger" @click="deleteCourse">
                    Delete Course
                </button>
         </tr>
       
    <br>

      </div>

<!-- sdfghjk -->
      <div v-if="editor.show" style="width: 500px"  class="card col-md-6">
        <h3>Edit Course</h3>
            <div>
                <div class="mb-3">
                    <label for="code">code</label>
                    <input type="text" v-model="course.code" class="form-control">
                </div>
                <div class="mb-3">
                      <label for="course_no">Course No</label>
                    <input type="number" v-model="course.course_no" class="form-control">

                  </div>
                  <div class="mb-3">
                      <label for="description">Description</label>
                      <input type="text" v-model="course.description" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="instructor">Instructor</label>
                    <input type="text" v-model="course.instructor" class="form-control">
                      
                  </div>
                  <div class="mb-3">
                      <label for="room">Room</label>
                    <input type="text" v-model="course.room" class="form-control">
                     
                  </div>
                  <button class="btn btn-sm btn-success float-right" margin="50px" @click="saveCourse">
                    Save Changes
                </button>
            </div>
    </div>





  </div>
</template>

<!-- <script>
export default {
    props: ['id'],
    data() {
        return {
            course:{}
        }
    },
    mounted() {
        fetch('http://127.0.0.1:8000/api/course/' + this.id)
        .then(res => res.json())
        .then(data => this.course = data)
        .then(err => console.log(err))
    }
}
</script> -->




<script>
export default {
    props: ['id'],
        data() {
            return{
                course: {},
                editor: {
                    show: false,
                    label: "Edit Course"
                }
            }
        },
        methods:{
            toggleEditor(){
                if(this.editor.show){
                    this.editor = {show: false, label: "Edit Course"}
                }else{
                    this.editor = {show: true, label:"Close Editor"}
                }
            },
            saveCourse(){
                 fetch('http://127.0.0.1:8000/api/courses/' + this.course.id,{
                    method: 'put',
                    headers: {
                    "Content-Type": "application/json"
                },
                credentials: "same-origin",
                body: JSON.stringify(this.course)
            })
              .then(res => res.json())
              .then(data => {
                  alert(data.brand + " has been updated.")
                  this.$router.push({ 
                      name: 'CourseInventory'
                      })
              })
              .catch(err=>console.log(err))
            },

            deleteCourse(){
                fetch('http://127.0.0.1:8000/api/courses/' + this.course.id,{
                method: 'delete'
                
            })
              .then(res => res.json())
              .then(data => {
                  alert(data.message)
                  this.$router.push({ 
                      name: 'CourseInventory'
                      })
              })
              .catch(err=>console.log(err))
            }  

        },
        mounted() {
            fetch('http://127.0.0.1:8000/api/courses/' + this.id)
            .then(res => res.json())
            .then(data => this.course = data)
            .catch(err => console.log(err))
    }
}

</script>

<style>
.card1{
    width: 50%;
    height: 20%;
    border: 2px;
    border-color: inherit;
    border-style: solid;
    border-radius: 10%;
}
</style>


