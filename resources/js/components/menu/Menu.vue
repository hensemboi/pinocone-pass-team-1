<template>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Menu Management</h2>
                    </div>
                    <div class="col-sm-6">
                        <button @click="deleteSelected" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></button>			
                        <button @click="openModel" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Menu</span></button>			
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="menuList">
                <thead>
                    <tr>
                        <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkedAll" v-model="selectAll">
                               
                                <label for="checkedAll"></label>
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
                    <tr v-for="menu in menuList" v-bind:key="menu.PK_menuID" >
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox" :value="menu.PK_menuID" v-model="selected" number>
								<label for="checkbox"></label>
							</span>
						</td>
                        <td>{{ menu.PK_menuID }}</td>
                        <td>{{ menu.menuName }}</td>
                        <td>{{ menu.description }}</td>
                        <td>{{ menu.price }}</td>
                        <td>{{ menu.totalOrders }}</td>
                        <td>{{ menu.FK_categoryCode }}</td>
                        <td>{{ menu.FK_cuisineCode }}</td>
                        <td>
                            <a @click="openEdit(menu)" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a @click="deleteMenu(menu)" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div v-if="myModel">
                <transition name="model">
                    <div class="modal-mask">
                        <div class="modal-wrapper">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" @click="myModel=false"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">{{ dynamicTitle }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="menuImage" class="form-label">Menu Image</label>
                                            <Dropzone @drop.prevent="drop" @change="selectedFile" @addedFile="files = $event" @addedImage="images = $event" v-bind:menuImages="currentMenu.images"/>

                                        </div>
                                        <div class="form-group">
                                            <label for="menuName" class="form-label">Menu Name</label>
                                            <input type="text" id="menuName" v-model="form.menuName" v-bind:class="{'form-control':true, 'is-invalid' : !validMenuName(form.menuName) && menuNameBlured}" v-on:blur="menuNameBlured = true">
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" id="description" v-model="form.description" v-bind:class="{'form-control':true, 'is-invalid' : !validDescription(form.description) && descriptionBlured}" v-on:blur="descriptionBlured = true">
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" id="price" v-model="form.price" v-bind:class="{'form-control':true, 'is-invalid' : !validPrice(form.price) && priceBlured}" v-on:blur="priceBlured = true">
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please input a valid price.</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Code</label>
                                            <select id="categoryCode" v-model="form.categoryCode" v-bind:class="{'form-control':true, 'is-invalid' : !validCategoryCode(form.categoryCode) && categoryCodeBlured}" v-on:blur="categoryCodeBlured = true"> 
                                            <option value="">Category Code</option>
                                            <option value="A001">A001</option>
                                            <option value="W001">W001</option>
                                            <option value="L001">L001</option>
                                            </select>
                                            <div class="valid-feedback">Nice!</div>
                                            <div class="invalid-feedback">Please select a category code.</div>        
                                        </div>			
                                        <div class="form-group">
                                            <label>Cuisine Code</label>
                                            <select id="cuisineCode" v-model="form.cuisineCode" v-bind:class="{'form-control':true, 'is-invalid' : !validCuisineCode(form.cuisineCode) && cuisineCodeBlured}" v-on:blur="cuisineCodeBlured = true">
                                            <option value="">Cuisine Code</option>
                                            <option value="A001">A001</option>
                                            <option value="W001">W001</option>
                                            <option value="L001">L001</option>
                                            </select>
                                            <div class="valid-feedback">Nice!</div>
                                            <div class="invalid-feedback">Please select a cuisine code.</div>                       
                                        </div>			
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form_action--button">
                                            <input type="button" class="btn btn-default" @click="myModel=false" value="Cancel">
                                            <input v-show="!editCheck" type="submit" class="btn btn-success" v-model="actionButton" v-on:click.stop.prevent="onSubmit">
                                            <input v-show="editCheck" type="submit" class="btn btn-primary" v-model="actionButton" v-on:click.stop.prevent="editMenu">
                                        </div>
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
// import Swal from 'sweetalert2'
import { ref } from "vue"
import Dropzone from './Dropzone.vue'

export default {
    components:{
        Dropzone,
    },
    setup(){
        let dropzoneFile = ref("");
        const drop = (e) => {
            dropzoneFile.value = e.dataTransfer.files;
        };
        const selectedFile = () => {
            dropzoneFile.value = document.querySelector(".dropzoneFile").files;
        };
        return { dropzoneFile, drop, selectedFile };
    },
    data() {
        return {
            myModel: false,
            deleteModel: false,
            selected:[],
            actionButton: "Add",
            dynamicTitle: "",
            menuList: [],
            images: [],
            files: [],
            formData: new FormData(),
            form: {
                "menuID": "",
                "menuName": "",
                "description": "",
                "price": "",
                "categoryCode": "",
                "cuisineCode": "",
            },
            editCheck: false,
            menuNameBlured: false,
            descriptionBlured: false,
            priceBlured: false,
            categoryCodeBlured: false,
            cuisineCodeBlured: false,
            valid: false,
            currentMenu : { images: [] },
        };
    },
    computed: {
        selectAll: {
            get: function () {
                return this.menuList ? this.selected.length == this.menuList.length : false;
            },
            set: function (value) {
                var selected = [];

                if (value) {
                    this.menuList.forEach(function (menu) {
                        selected.push(menu.PK_menuID);
                    });
                }

                this.selected = selected;
            }
        }
    },
    created() {
        axios.get("./menu", this.form)
            .then(response => this.menuList = response.data);
    },
    methods: {
        openModel() {
            this.editCheck = false;
            this.actionButton = "Add",
            this.form.menuName = "";
            this.form.description = "";
            this.form.price = "";
            this.form.categoryCode = "";
            this.form.cuisineCode = "";
            this.myModel = true;
            this.currentMenu = { images: [] };
        },
        validate() {
            this.menuNameBlured = true;
            this.descriptionBlured = true;
            this.priceBlured = true;
            this.categoryCodeBlured = true;
            this.cuisineCodeBlured = true;
            if (this.validMenuName(this.form.menuName) && this.validDescription(this.form.description) && this.validPrice(this.form.price) && this.validCategoryCode(this.form.categoryCode) && this.validCuisineCode(this.form.cuisineCode)) {
                this.valid = true;
            }
        },
        validMenuName(menuName) {
            if (menuName.length > 1) {
                return true;
            }
        },
        validDescription(description) {
            if (description.length >= 1) {
                return true;
            }
        },
        validPrice(price) {
            var num = /^-?\d+(,\d{3})*(\.\d{1,2})?$/;
            if (num.test(price)) {
                return true;
            }
        },
        validCategoryCode(categoryCode) {
            if (categoryCode != "") {
                return true;
            }
        },
        validCuisineCode(cuisineCode) {
            if (cuisineCode != "") {
                return true;
            }
        },
        async onSubmit() {
            this.validate();
            if (this.valid) {
                this.myModel = false;
            }

            this.files.forEach(file => {
                this.formData.append("images[]", file);
            });

            const menu = (await axios.post("./menu", this.form)).data;
            this.menuList = menu.menuList;

            Swal.fire({
                title: "Success!",
                html: "Menu created successfully!",
                icon: "success",
                confirmButtonColor: "#fed531",
                confirmButtonText: "OK",
            });

            axios.post('./upload/' + menu.menuID, this.formData)
                .then(response => {
                    this.images = [];
                    this.files = [];
                    this.formData = new FormData();

                });
        },
        openEdit(editmenu) {
            this.editCheck = true;
            this.actionButton = "Update",
                axios.get("./menu", this.form);
            this.form.menuID = editmenu.PK_menuID;
            this.currentMenu = editmenu;
            this.form.menuName = editmenu.menuName;
            this.form.description = editmenu.description;
            this.form.price = editmenu.price;
            this.form.categoryCode = editmenu.FK_categoryCode;
            this.form.cuisineCode = editmenu.FK_cuisineCode;
            this.myModel = true;
        },
        async editMenu() {
            this.files.forEach(file => {
                this.formData.append("images[]", file);
            });
            const menu = (await axios.put("./menu", this.form)).data;
            this.menuList = menu.menuList;

            Swal.fire({
                    title: "Success!",
                    html: "Menu updated!",
                    icon: "success",
                    confirmButtonColor: "#fed531",
                    confirmButtonText: "OK",
                });
            axios.post('./upload/' + menu.menuID, this.formData)
                .then(response => {
                    this.images = [];
                    this.files = [];
                    this.formData = new FormData();
                });
            this.myModel = false;
        },
        deleteMenu(menu) {
            Swal.fire({
                title: `Are you sure you want to delete this menu?`,
                text: "This process cannot be undone.",
                icon: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: "#fed531",
                cancelButtonColor: "#808080",
                confirmButtonText: "Yes!"
            })
                .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    axios.delete("./menu/" + menu.PK_menuID)
                        .then(response => this.menuList = response.data);
                    Swal.fire("Deleted", "Poof! Your menu has been deleted!", "success");
                }
                else {
                    Swal.fire("Canceled", "You have canceled your action", "error");
                }
            });
        },
        deleteSelected(){
             Swal.fire({
                title: `Are you sure you want to delete these menus?`,
                text: "This process cannot be undone.",
                icon: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: "#fed531",
                cancelButtonColor: "#808080",
                confirmButtonText: "Yes!"
            })
                .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    axios.delete("menu", { data: {selected: this.selected}})
                        .then(response => this.menuList = response.data);
                    Swal.fire("Deleted", "Poof! Your menus have been deleted!", "success");
                }
                else {
                    Swal.fire("Canceled", "You have canceled your action", "error");
                }
            });
        },

    }, 
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
.images-preview {
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
}

img{
    max-height: 105px;
}
</style>
