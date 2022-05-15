<template>        
    <div class="">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Menu Management</h2>
                    </div>
                    <div class="col-sm-6">
                        <button @click="deleteChecked" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></button>			
                        <button v-on:click="addMenu" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Menu</span></button>			
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="menuList">
                <thead>
                    <tr>
                        <th>
                           <span class="custom-checkbox">
								<input type="checkbox" id="checkAllBox" v-model="checkedAll" @click="check">
                                <label for="checkedAll"></label>
							</span>						
						</th>
                        <th v-on:click="sort('PK_menuID');sortField = 'PK_menuID'; isAsc = !isAsc" :class="{desc:isAsc && sortField =='PK_menuID', asc:!isAsc && sortField =='PK_menuID'}" class="tablesorter-header">Menu ID</th>
                        <th v-on:click="sort('menuName');sortField = 'menuName'; isAsc = !isAsc" :class="{desc:isAsc && sortField =='menuName', asc:!isAsc && sortField =='menuName'}" class="tablesorter-header">Menu Name</th>
                        <th>Description</th>
                        <th v-on:click="sort('price');sortField = 'price'; isAsc = !isAsc" :class="{desc:isAsc && sortField =='price', asc:!isAsc && sortField =='price'}"  class="tablesorter-header">Price</th>
                        <th v-on:click="sort('totalOrders');sortField = 'totalOrders'; isAsc = !isAsc" :class="{desc:isAsc && sortField =='totalOrders', asc:!isAsc && sortField =='totalOrders'}" class="tablesorter-header">Total Orders</th>
                        <th v-on:click="sort('category.name');sortField = 'category'; isAsc = !isAsc" :class="{desc:isAsc && sortField =='category', asc:!isAsc && sortField =='category'}" class="tablesorter-header">Category</th>
                        <th v-on:click="sort('cuisinetype.name');sortField = 'cuisinetype'; isAsc = !isAsc" :class="{desc:isAsc && sortField =='cuisinetype', asc:!isAsc && sortField =='cuisinetype'}" class="tablesorter-header">Cuisine</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="queried" v-for="menu in menus" v-bind:key="menu">
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkBox" :value="menu.PK_menuID" v-model="checked">
                            <label for="checkbox"></label>
                        </span>
                    </td>
                    <td >{{ menu.PK_menuID}}</td>
                    <td ref="searched" v-html="highlight(menu.menuName, searchQuery)"></td>
                    <td v-html="highlight(menu.description, searchQuery)"></td>
                    <td>RM {{ menu.price }}</td>
                    <td >{{ menu.totalOrders }}</td>
                    <td v-html="highlight(menu.category.name, searchQuery)"></td>
                    <td v-html="highlight(menu.cuisinetype.name, searchQuery)"></td>
                    <td>
                        <a v-on:click="editMenu(menu)" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
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
                                        <button type="button" class="close" v-on:click="myModel=false"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">{{ dynamicTitle }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="menuImage" class="form-label">Menu Image</label>
                                            <Dropzone @drop.prevent="drop" @change="selectedFile" @addedFile="files = $event" @addedImage="images = $event" images="currentMenu.images"/>
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
import {computed, ref, watch} from 'vue';


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
        props: ["menus", "searchQuery"],
        setup(props, context){
            const sortField =ref();
            const isAsc = ref(false);
            const myModel = false;
            const deleteModel = false;
            const actionButton = 'Add';
            const dynamicTitle = '';
            const currMenuList = [];
            const errors = new Errors();
            const menuList = props.menus;
            const form = {
                'menuID': "",
                'menuName': "",
                'description': "",
                'price': "",
                'totalOrders': "",
                'categoryCode': "",
                'cuisineCode': "",
            }

            // const menuList =  await store.dispatch('menu/fetchAllMenus', {url: "/products",action: 'index'});
            // console.log(menuList.category)

            function sortBy(){
                
            }

            function func(){
                console.log("menuName")
            }

            function openModel(){
                form.menuName = ""
                form.description = ""
                form.price = ""
                form.categoryCode = ""
                form.cuisineCode = ""
                myModel = true
            }

            function openDeleteModel(){
                deleteModel = true
            }
            function onSubmit() {
                axios.post('./menu', form)
                    .then(response => alert('Success'))
                    .catch(error => errors.record(error.response.data))
            }
            function onSuccess(response){
                alert(response.data.message);
            }
            function resetForm() {
                form.menuName = ""
                form.description = ""
                form.price = ""
                form.categoryCode = ""
                form.cuisineCode = ""
            }
            function deleteMenu(menu) {
                form.menuID = menu.PK_menuID
                form.menuName = menu.menuName
                form.description = menu.description
                form.price = menu.price
                form.totalOrders = menu.totalOrders
                form.categoryCode = menu.FK_categoryCode
                form.cuisineCode = menu.FK_cuisineCode
                axios.delete('./menu/' + menu.PK_menuID, { data: form })
            }
            function sort(key){
                context.emit('sort',key)
            }
            function addMenu(){
                context.emit('add')
            }
            function highlight(current, query){
                let it = query
                let c = new RegExp(it, "gi") 
                let found = current.search(c) !== -1;
                return !found ? current : current.replace(c, '<span class="highlight" style="background: #fc0;border-radius: 3px">' + it + '</span>');
            }
            function editMenu(menu){
                context.emit('edit', menu)
            }

            return{
                myModel,
                deleteModel,
                actionButton,
                dynamicTitle,
                menuList,
                currMenuList,
                errors,
                form,
                isAsc,
                sortField,
                openModel,
                openDeleteModel,
                onSubmit,
                onSuccess,
                resetForm,
                deleteMenu,
                sort,
                highlight,
                editMenu,
                addMenu
            }
        },
    }
</script>

<style scoped>
body{
    background-color: #fed531;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.tablesorter-header {
    position: relative;          /* This is needed for the absolute positioning. */
}

.tablesorter-header::before,
.tablesorter-header::after {
    position: absolute;
    right: 0.75em;
    font-family: 'FontAwesome';  /* Use FontAwesome's font so that you can set the content */
    opacity: 0.3;                /* Set opacity to gray out icons by default */
}

.tablesorter-header::before {
    content: '\f0de';            /* Font Awesome's up arrow */
    top: calc(50% - 0.75em);     /* Tricky to calculate the top offset */
}

.tablesorter-header::after {
    content: '\f0dd';            /* Font Awesome's down arrow */
    bottom: calc(50% - 0.75em);
}

.tablesorter-header.asc::before,
.tablesorter-header.desc::after {
    opacity: 1;                  /* When sorting, set full opacity on the direction */
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

span .highlight{
    color: #0397d6 !important;
}

</style>
