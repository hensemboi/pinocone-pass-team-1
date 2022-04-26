<template>
    <div>
        <table>
            <tr>
                <td>
                        <div>
                            <label for="menuName">Menu Name</label>
                            <input type="text" id="menuName" v-model="form.menuName" required/> 
                        </div>
                        <div>
                            <label for="description">Description</label>
                            <input type="text" id="description" v-model="form.description" required/> 
                        </div>
                        <div>
                            <label for="price">Price</label>
                            <input type="text" id="price" v-model="form.price" required/> 
                        </div>
                        <div>
                            <label for="totalOrders">Total Orders</label>
                            <input type="text" id="totalOrders" v-model="form.totalOrders" required/> 
                        </div>
                        <div>
                            <label for="categoryCode">Category Code</label>
                            <select id="categoryCode" v-model="form.FK_categoryCode" required> 
                                <option value="">Category Code</option>
                                <option value="A001">A001</option>
                                <option value="W001">W001</option>
                                <option value="L001">L001</option>
                            </select>
                        </div>
                        <div>
                            <label for="cuisineCode">Cuisine Code</label>
                            <select id="cuisineCode" v-model="form.FK_cuisineCode" required> 
                                <option value="">Cuisine Code</option>
                                <option value="A001">A001</option>
                                <option value="W001">W001</option>
                                <option value="L001">L001</option>
                            </select>
                        </div>

                        <div class="form_action--button">
                            <button @click="submitForm">Submit</button>
                            <input @click="resetForm" type="reset" value="Reset" />
                        </div>

                    <td>
                        <table class="list" id="menuList">
                            <tr>
                                <th>Menu ID</th>
                                <th>Menu Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Total Orders</th>
                                <th>Category Code</th> 
                                <th>Cuisine Code</th>
                                <th id="Delete">Delete</th>
                            </tr>
                            <tr v-for="menu in menuList">
                                <td>{{ menu.PK_menuID }}</td>
                                <td>{{ menu.menuName}}</td>
                                <td>{{ menu.description }}</td>
                                <td>{{ menu.price }}</td>
                                <td>{{ menu.totalOrders }}</td>
                                <td>{{ menu.categoryCode }}</td>
                                <td>{{ menu.cuisineCode }}</td>
                                <td>
                                    <button @click="deleteMenu(menu, menu.PK_menuID)">Delete</button>
                                </td>
                            </tr>
                        </table>
                    </td>
                </td>
            </tr>
        </table>
    </div>
</template>
   
<script>
    export default {
        data() {
            return {
                menuList: [],
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
            submitForm() {
                if (this.form.menuName == ""){
                    alert("Menu name must not be empty");
                }
                if (!/^[a-zA-Z0-9-]*$/g.test(this.form.menuName)){
                    alert("Invalid characters for menu name");
                }
                if (this.form.description == ""){
                    alert("Description must not be empty");
                }
                if (!/^[0-9.]*$/g.test(this.form.price)){
                    alert("Only digits and '.' are allowed for price");
                }
                if (!/[^0-9.]*$/g.test(this.form.totalOrders)){
                    alert("Only digits and one decimal point are allowed for total orders");
                }
                if (this.form.categoryCode == ""){
                    alert("Select a category code");
                }
                if (this.form.cuisineCode == ""){
                    alert("Select a cuisine code");
                }
                axios.post('./menu', this.form)
            },
            resetForm() {
                this.form.menuName = ""
                this.form.description = ""
                this.form.price = ""
                this.form.totalOrders = ""
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

button{
    background: #fed531;
    padding: 8px 12px;
    margin: 15px 0 10px;
    display: inline-block;
    border: none;
    border-radius: 30px;
    font-size: 1rem;
    cursor: pointer;
    outline: none;
    font-family: inherit;
}

button:hover{
    background: #866c35;
}

input[type="text"],input[type="number"], select{
    width: 91%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px outset ;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

select{
    color: grey;
    height: 2.5rem;
    font-family: inherit;
}

input[type="submit"],input[type="reset"]{
    background: #fed531;
    padding: 8px 12px;
    margin: 15px 0 10px;
    display: inline-block;
    border: none;
    border-radius: 30px;
    font-size: 1rem;
    cursor: pointer;
    outline: none;
}

input[type="reset"]:hover{
    background:  #866c35;
}   

table{
    width: 90%;
    margin: 40px auto;
    background: rgb(236, 232, 227);
}

table.list{
    text-align: center;
    width: 100%;
}

td{
    border: 1px solid white;
    text-align: left;
    padding: 8px 15px;
}

tr:nth-child(even), table.list thread> tr{
    background-color: rgb(181, 181, 24);
}

#Delete {
    color: red;
}
</style>