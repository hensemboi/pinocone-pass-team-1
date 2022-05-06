<template>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Menu Management</h2>
                    </div>
                    <div class="col-sm-6">
                      <button @click="deleteModel = true" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></button>	
                      <button @click="myModel = true" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Menu</span></button>			
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="menuList">
                <thead>
                    <tr>
                        <th>
                          <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                          </span>
                        </th>
                        <th>Menu ID</th>
                        <th>Menu Name</th>
						<th>Description</th>
                        <th>Price</th>
                        <th>Total Orders</th>
                        <th>Category Code</th>
                        <th>Cuisine Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="menu in menuList" v-bind:key="menu">
                        <td>
                            <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                            <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td>{{ menu.PK_menuID}}</td>
                        <td>{{ menu.menuName}}</td>
                        <td>{{ menu.description }}</td>
                        <td>{{ menu.price }}</td>
                        <td>{{ menu.totalOrders }}</td>
                        <td>{{ menu.categoryCode}}</td>
                        <td>{{ menu.cuisineCode}}</td>
                        <td>
                            <a href="" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="myModel">
                <transition name="model">
                    <div class="modal-mask">
                        <div class="modal-wrapper">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" @click="myModel=false"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">{{dynamicTitle}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="menuName">Menu Name</label>
                                            <input type="text" class="form-control" id="menuName" v-model="menuName" required>
                                            <span class="help is-danger" v-text="errors.get('menuName')"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control"  id="description" v-model="description" required></textarea>
                                            <span class="help is-danger" v-text="errors.get('description')"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" id="price" v-model="price" required>
                                            <span class="help is-danger" v-text="errors.get('price')"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Code</label>
                                            <select id="categoryCode" v-model="FK_categoryCode" required> 
                                            <option value="">Category Code</option>
                                            <option value="A001">A001</option>
                                            <option value="W001">W001</option>
                                            <option value="L001">L001</option>
                                            </select>
                                              <span class="help is-danger" v-text="errors.get('categoryCode')"></span>
                                        </div>			
                                        <div class="form-group">
                                            <label>Cuisine Code</label>
                                            <select id="cuisineCode"  v-model="FK_cuisineCode" required> 
                                            <option value="">Cuisine Code</option>
                                            <option value="A001">A001</option>
                                            <option value="W001">W001</option>
                                            <option value="L001">L001</option>
                                            </select>
                                            <span class="help is-danger" v-text="errors.get('cuisineCode')"></span>
                                        </div>			
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" @click="myModel=false" value="Cancel">
                                        <input type="submit" class="btn btn-success" v-model="actionButton" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
         </div>
    </div>
</template>
	
<script>

class Errors{
    constructor(){

        this.errors = { };

    }

    get(field){
        if (this.errors[field]){
            return this.errors[field][0];
        }
    }

    record(errors){
        this.errors = errors;
    }
}
    export default {
        data() {
            return {
                myModel: false,
                deleteModel:false,
                actionButton:'Add',
                dynamicTitle:'',
                menuList: [],
                errors: new Errors(),
                form: {
                    'menuID': "",
                    'menuName': "",
                    'description': "",
                    'price': "",
                    'totalOrders': "",
                    'categoryCode': "",
                    'cuisineCode': "",
                }
            }
        },
        created() {
           axios.get('./menu', this.form)
            .then(response => this.menuList = response.data)
        },
        methods: {
            openModel(){
                this.form.menuName = ""
                this.form.description = ""
                this.form.price = ""
                this.form.categoryCode = ""
                this.form.cuisineCode = ""
                this.myModel = true
            },
            openDeleteModel(){
                this.deleteModel = true
            },
            onSubmit() {
                axios.post('./menu', this.form)
                    .then(response => alert('Success'))
                    .catch(error => this.errors.record(error.response.data))
            },
            onSuccess(response){
                alert(response.data.message);

            },
            resetForm() {
                this.form.menuName = ""
                this.form.description = ""
                this.form.price = ""
                this.form.categoryCode = ""
                this.form.cuisineCode = ""
            },
            deleteMenu(menu) {
                this.form.menuID = menu.PK_menuID
                this.form.menuName = menu.menuName
                this.form.description = menu.description
                this.form.price = menu.price
                this.form.totalOrders = menu.totalOrders
                this.form.categoryCode = menu.FK_categoryCode
                this.form.cuisineCode = menu.FK_cuisineCode

                axios.delete('./menu/' + menu.PK_menuID, { data: this.form })
            }
        }
    }
</script>

<style scoped>
body{
    background-color: #fed531;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.table-wrapper {
    background: #fff;
    padding: 20px 25px;
    margin: 30px 0;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
    padding-bottom: 15px;
    background: #fed531;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn-group {
    float: left;
}
.table-title .btn {
    color: #fff;
    float: right;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
.table-title .btn span {
    float: left;
    margin-top: 2px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}	
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
    outline: none !important;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
    position: relative;
}
.custom-checkbox input[type="checkbox"] {    
    opacity: 0;
    position: absolute;
    margin: 5px 0 0 3px;
    z-index: 9;
}
.custom-checkbox label:before{
    width: 18px;
    height: 18px;
}
.custom-checkbox label:before {
    content: '';
    margin-right: 10px;
    display: inline-block;
    vertical-align: text-top;
    background: white;
    border: 1px solid #bbb;
    border-radius: 2px;
    box-sizing: border-box;
    z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
    content: '';
    position: absolute;
    left: 6px;
    top: 3px;
    width: 6px;
    height: 11px;
    border: solid #000;
    border-width: 0 3px 3px 0;
    transform: inherit;
    z-index: 3;
    transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
    border-color: #03A9F4;
    background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
    border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
    color: #b8b8b8;
    cursor: auto;
    box-shadow: none;
    background: #ddd;
}
/* Modal styles */
.modal{
position: fixed;
  z-index: 999;
  top: 20%;
  left: 50%;
  width: 300px;
  margin-left: -150px;
}
.modal-mask{
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.5);
    display: table;
    transition: opacity .3s ease;
}
.modal-wrapper{
    display: table-cell;
    vertical-align: middle;
}
.modal .modal-dialog {
    max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
    padding: 20px 30px;
}
.modal .modal-content {
    border-radius: 3px;
}
.modal .modal-footer {
    background: #ecf0f1;
    border-radius: 0 0 3px 3px;
}
.modal .modal-title {
    display: inline-block;
    
}
.modal .form-control {
    border-radius: 2px;
    box-shadow: none;
    border-color: #dddddd;
}
.modal textarea.form-control {
    resize: vertical;
}
.modal .btn {
    border-radius: 2px;
    min-width: 100px;
}	
.modal form label {
    font-weight: normal;
}

</style>
