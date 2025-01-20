<template>
    <h1>Department Lists</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header bg-dark">
                    <h5 class="text-light float-start">Departments</h5>
                    <button class="btn btn-success float-end" @click="createDepartment">Create Department</button>

                </div>

            </div>
            <div class="card-body" >


                <div class="table-responsive" >
                    <table class="table table-hover text-center" >
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Director</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(department,index) in departments" :key="index">
                                <td>{{index+1}}</td>
                                <td>{{department.name}}</td>
                                <td>{{ department.director_id }}</td>
                                <td>
                                    <button class="btn btn-success mx-1" @click="editDepartment(department)"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger mx-1" @click="deleteDepartment(department)"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{!editMode ? 'Create Department' : 'Edit Department'}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">




                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Department Name</label>
                                            <input type="text" name="name" class="form-control" v-model="departmentData.name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="director_id">Director</label>
                                            <select name="director_id" class="form-control" v-model="departmentData.director_id">
                                                <option value="">Select a person</option>
                                                <option value="1">IT Director</option>
                                                <option value="2">HR Director</option>

                                            </select>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success"  @click="handleButtonClick">{{!editMode ?'Store':'Save Changes'}}</button>
                                <!-- <button type="button" class="btn btn-success"  @click="!editMode ? storeDepartment():updateDepartment()">{{!editMode ?'Store':'Save Changes'}}</button> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</template>

<script>

import axios from 'axios';

export default {

    data() {
        return {
            editMode:false,
            departments:{},
            departmentData:{
            id:'',
            name: '',
            director_id: ''
            }
        }
    },
    methods: {


        handleButtonClick() {
    //  If in edit mode, call updateDepartment, otherwise call storeDepartment
   if (this.editMode) {
       this.updateDepartment();
  } else {
      this.storeDepartment();
    }
  },
         getDepartments() {
        axios.get(`${window.baseUrl}api/getDepartment`)
        .then((response) => {
            console.log('Departments:', response.data);
            this.departments=response.data;
        });

},

      deleteDepartment(department){

        if(confirm("Are you sure want to delete it?")){

        axios.post(window.baseUrl+'api/deleteDepartment/'+department.id)

           .then((response)=>{
            this.getDepartments()

           });
        }

      },

      editDepartment(department){
         // console.log(department)
         this.editMode=true
         this.departmentData.id=department.id
         this.departmentData.name=department.name
         this.departmentData.director_id=department.director_id
         $('#exampleModal').modal('show')

      },

      updateDepartment(){

        axios.post(window.baseUrl+'api/updateDepartment/'+this.departmentData.id,this.departmentData)
           .then((response)=>{
            this.getDepartments()
            // console.log(response.data);
            $('#exampleModal').modal('hide')

        });
      },

        createDepartment() {
            this.editMode=false
            this.departmentData.name=this.departmentData.director_id='';
            $('#exampleModal').modal('show') //JQuery selector targeting 'show' argument is a command that tells Bootstrap to display the modal.
        },

        storeDepartment() {
            axios.post(window.baseUrl+'api/storeDepartment',this.departmentData)
           .then((response)=>{
            this.getDepartments()

            // console.log(response.data);
            $('#exampleModal').modal('hide')

        });
      }


    },
    mounted() {
        this.getDepartments()
    }

}

</script>
