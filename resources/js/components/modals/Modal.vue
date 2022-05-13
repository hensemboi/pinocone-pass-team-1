<template>
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
</template>

<script>
    mport {useStore} from 'vuex';
import {computed, ref, watch} from 'vue';
import { useRouter } from "vue-router";
import store from '../store';
import useSort from '../hooks/sort'

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
        props: ["menu"],
        setup(props, context){
            const myModel = false;
            const deleteModel = false;
            const actionButton = 'Add';
            const dynamicTitle = '';
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
            const cuisineCodeBlured = false;
            const valid = false;
            const currentMenu  = { images: [] };
            const selectAll = computed({
                get(){
                    return this.menuList ? this.selected.length == this.menuList.length : false;
                },
                set(value) {
                    var selected = [];
                    if (value) {
                        this.menuList.forEach(function (menu) {
                            selected.push(menu.PK_menuID);
                        });
                    }
                    this.selected = selected;
                }  
            })

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
                console.log("Sorting " + key)
                context.emit('sort',key)
            }
            function highlight(current, query){
                let it = query
                console.log(it)
                let c = new RegExp(it, "gi") 
                let found = current.search(c) !== -1;
                return !found ? current : current.replace(c, '<span class="highlight" style="background: #fc0;border-radius: 3px">' + it + '</span>');
            }

            function openModel() {
            this.editCheck = false;
            this.actionButton = "Add",
            this.form.menuName = "";
            this.form.description = "";
            this.form.price = "";
            this.form.categoryCode = "";
            this.form.cuisineCode = "";
            this.myModel = true;
            this.currentMenu = { images: [] };
        }
        function validate() {
            this.menuNameBlured = true;
            }
        async function onSubmit() {
            this.validate();
            if (this.valid) {
                this.myModel = false;
                                axios.post('./menu', form)
                    .then(response => alert('Success'))
                    .catch(error => errors.record(error.response.data))
                    this.images = [];
                    this.files = [];
                    this.formData = new FormData();
                });
        }
         function openEdit(editmenu) {
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
        function editMenu() {
            axios.put("./menu", this.form)
                .then(response => {
                Swal.fire({
        async  function editMenu() {
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
                this.menuList = response.data;
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
@@ -302,6 +334,28 @@ export default {
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
                highlight
            }
        },  
        mounted() {
            console.log(this.$refs.searched[0].innerHTML)
        }
    }

    setup(){
        let dropzoneFile = ref("");
        const drop = (e) => {
            dropzoneFile.value = e.dataTransfer.files[0];
            dropzoneFile.value = e.dataTransfer.files;
        };
        const selectedFile = () => {
            dropzoneFile.value = document.querySelector(".dropzoneFile").files[0];
            dropzoneFile.value = document.querySelector(".dropzoneFile").files;
        };
        return { dropzoneFile, drop, selectedFile };
    },
    data() {
        return {
            
            }
        }
    }
    
</script>