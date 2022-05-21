<template>
    <div v-if="myModel" >
        <transition name="model" >
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" v-on:click="closeModal"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">{{ dynamicTitle }}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="menuImage" class="form-label">Menu Image</label>
                                    <Dropzone v-on:drop.prevent="drop" v-on:change="selectedFile" v-on:addedFile="files = $event" v-on:addedImage="images = $event" images="currentMenu.images"/>
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
                                    <option v-for="c in categories" :value="c.PK_categoryCode" :key="c.PK_categoryCode">{{c.PK_categoryCode}} - {{c.name}}</option>
                                    </select>
                                    <div class="valid-feedback">Nice!</div>
                                    <div class="invalid-feedback">Please select a category code.</div>        
                                </div>			
                                <div class="form-group">
                                    <label>Cuisine Code</label>
                                    <select id="cuisineCode" v-model="form.cuisineCode" v-bind:class="{'form-control':true, 'is-invalid' :
                                     !validCuisineCode(form.cuisineCode) && cuisineCodeBlured}" v-on:blur="cuisineCodeBlured = true">
                                        <option value="">Cuisine Code</option>
                                        <option v-for="c in cuisines" :value="c.PK_cuisineCode" :key="c.PK_cuisineCode">{{c.PK_cuisineCode}} - {{c.name}}</option>
                                    </select>
                                    <div class="valid-feedback">Nice!</div>
                                    <div class="invalid-feedback">Please select a cuisine code.</div>                       
                                </div>			
                            </div>
                            <div class="modal-footer">
                                <div class="form_action--button">
                                    <input type="button" class="btn btn-default" v-on:click="myModel=false" value="Cancel">
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
</template>

<script>
import {computed, ref, watch, toRefs, toRef} from 'vue';
// import Swal from 'sweetalert2'
import Dropzone from './../menu/Dropzone.vue'

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
        components:{
            Dropzone
        },
        props: {
            menu:{
                required: false,
                default: false
            },
            modal:{
                required: true,
                default: false
            },
            categories:{
                required: true,
                default: false
            },
            cuisines:{
                required: true,
                default: false
            },
            editCheck:{
                required: true,
                default: false
            }
        },
        setup(props, context){
            const myModel = computed(()=>{
                let v = toRef(props, 'modal')
                return v.value
            })
            const editCheck = computed(()=>{
                let v = toRef(props, 'editCheck')
                return v.value
            })
            const selected =[];
            var menuList = [];
            const editedMenu = computed(()=>{
                let v = toRef(props, 'menu')
                return v.value
            })
            var menuNameBlured = false;
            var descriptionBlured = false;
            var priceBlured = false;
            var categoryCodeBlured = false;
            var cuisineCodeBlured = false;
            let currentMenu  = { images: [] };
            const deleteModel = false;
            const actionButton = computed(()=>{
                return editCheck.value? 'Update' : 'Add'
            });
            const dynamicTitle = computed(()=>{
                return editCheck.value? 'Update' : 'Add'
            })
            const errors = new Errors();
            const form = {
                'menuID': "",
                'menuName': "",
                'description': "",
                'price': "",
                'totalOrders': "",
                'categoryCode': "",
                'cuisineCode': "",
            }
            const images = [];
            const files = [];
            const formData = new FormData();
            const valid = false;
            const selectAll = computed({
                get(){
                    return menuList ? selected.length == menuList.length : false;
                },
                set(value) {
                    var selected = [];
                    if (value) {
                        menuList.forEach(function (menu) {
                            selected.push(menu.PK_menuID);
                        });
                    }
                    selected = selected;
                }  
            })
            let dropzoneFile = ref("");
            const drop = (e) => {
                dropzoneFile.value = e.dataTransfer.files;
            };
            const selectedFile = () => {
                dropzoneFile.value = document.querySelector(".dropzoneFile").files;
            };

            function openModel() {
                form.menuName = "";
                form.description = "";
                form.price = "";
                form.categoryCode = "";
                form.cuisineCode = "";
                currentMenu = { images: [] };
            }
            function validate() {
                menuNameBlured = true;
                descriptionBlured = true;
                priceBlured = true;
                categoryCodeBlured = true;
                cuisineCodeBlured = true;
                if (validMenuName(form.menuName) && validDescription(form.description) && validPrice(form.price) && validCategoryCode(form.categoryCode) && validCuisineCode(form.cuisineCode)) {
                    valid = true;
                }
            }
            function validMenuName(menuName) {
                if (menuName.length > 1) {
                    return true;
                }
            }
            function validDescription(description) {
                if (description.length >= 1) {
                    return true;
                }
            }
            function validPrice(price) {
                var num = /^-?\d+(,\d{3})*(\.\d{1,2})?$/;
                if (num.test(price)) {
                    return true;
                }
            }
            function validCategoryCode(categoryCode) {
                if (categoryCode != "") {
                    return true;
                }
            }
            function validCuisineCode(cuisineCode) {
                if (cuisineCode != "") {
                    return true;
                }
            }
            async function  onSubmit() {
                console.log('adding')
                console.log(form.categoryCode)
                validate();
                if (valid) {
                    myModel = false;
                }

                files.forEach(file => {
                    formData.append("images[]", file);
                });

                let menu = (await axios.post("./menu", form)).data;
                menuList = menu.menuList;

                Swal.fire({
                    title: "Success!",
                    html: "Menu created successfully!",
                    icon: "success",
                    confirmButtonColor: "#fed531",
                    confirmButtonText: "OK",
                });

                axios.post('./upload/' + menu.menuID, formData)
                    .then(response => {
                        images = [];
                        files = [];
                        formData = new FormData();
                    });
            }
            function openEdit() {
                axios.get("./menu", form);
                form.menuID = editedMenu.PK_menuID;
                currentMenu = editedMenu;
                form.menuName = editedMenu.menuName;
                form.description = editedMenu.description;
                form.price = editedMenu.price;
                form.categoryCode = editedMenu.FK_categoryCode;
                form.cuisineCode = editedMenu.FK_cuisineCode;
            }
            function closeModal(){
                context.emit('closeModal')
            }
            async function editMenu() {
                console.log("editting")
                
                // files.forEach(file => {
                //     formData.append("images[]", file);
                // });
                // const menu = (await axios.put("./menu", form)).data;
                // menuList = menu.menuList;

                // Swal.fire({
                //         title: "Success!",
                //         html: "Menu updated!",
                //         icon: "success",
                //         confirmButtonColor: "#fed531",
                //         confirmButtonText: "OK",
                //     });
                // axios.post('./upload/' + menu.menuID, formData)
                //     .then(response => {
                //         images = [];
                //         files = [];
                //         formData = new FormData();
                //     });
                // myModel = false;
            }   
            function deleteMenu(menu) {
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
                            .then(response => menuList = response.data);
                        Swal.fire("Deleted", "Poof! Your menu has been deleted!", "success");
                    }
                    else {
                        Swal.fire("Canceled", "You have canceled your action", "error");
                    }
                });
            }
            function deleteSelected(){
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
                        axios.delete("menu", { data: {selected: selected}})
                            .then(response => menuList = response.data);
                        Swal.fire("Deleted", "Poof! Your menus have been deleted!", "success");
                    }
                    else {
                        Swal.fire("Canceled", "You have canceled your action", "error");
                    }
                });
            }
            if(editCheck){
                openModel()
            }else{
                editEdit()
            }

            return{
                myModel,
                deleteModel,
                actionButton,
                dynamicTitle,
                menuList,
                errors,
                form,
                openModel,
                onSubmit,
                deleteMenu,
                deleteSelected,
                editMenu,
                openEdit,
                validCategoryCode,
                validCuisineCode,
                validDescription,
                validMenuName,
                validPrice,
                validate,
                closeModal,
                selectAll,
                images,
                editCheck,
                menuNameBlured,
                descriptionBlured,
                categoryCodeBlured,
                cuisineCodeBlured,
                priceBlured,
                currentMenu,
                dropzoneFile, 
                drop, 
                selectedFile,
                Dropzone
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
.images-preview {
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
}

img{
    max-height: 105px;
}
</style>
