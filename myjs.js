new Vue({

    el: "#app",

    data() {
      return {
        errorMessage: "",
        successMessage : "",

        seen: true,
        showAlertGood: false,
        showAlertBad: false,
        
        databaseList: [] ,
        databaseListMaterial: [],
        databaseListCatagory: [],
        databaseListSubCatagory: [],
        databaseListItem: [],
        databaseListOneItem: [],

        databaseList2: [] ,

        inputt: {mfug: ""},
        inputt_material: {material: ""},
        inputt_catagory: {catagory: ""},
        inputt_subcatagory: {subcatagoryname: "", choosen_catagory: ""},
        
        inputt_item: {itemname: "", itemcode: "", itemdescription: "", itemvariant: "", 
                      ichoosen_mfug: "", ichoosen_material: "", ichoosen_catagory: "", ichoosen_subcatagory: "",
                      itemimage: "", itemts: ""}, //new to be more

        one_item: {itemname: "", itemcode: "", itemdescription: "", itemvariant: ""},
        inputt_edititem: {edit_itemname: "", edit_itemcode: "", edit_itemdescription: "", edit_itemvariant: ""},

        delete_itemkey: {itemkey: ""},
        
        modalInfo: {itemname: "", itemcode: "", itemdescription: "", itemvariant: ""}

      };
    },
    computed: {

   },
    mounted(){
      //this.readMfug();
      this.readMfug2();
      this.readMaterial();
      this.readCatagory();
      this.readSubCatagory();
      this.readItem();
      //this.readOneItem();
    },
    
    methods:{

      getImg(url) {
        return require(`@/htdocs/products_db/stored_images/${url}`);
      },

      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;
        this.createImage(files[0]);
      },
      /*
      readMfug(){

        axios.get("http://localhost/products_db/read_php/read_mfug.php?action=read").then(function(response) {


          this.databaseList =  response.data.show_all_mfug  ;


          console.log("AA2. ", this.databaseList );
          
        }.bind(this));

      },
      */
      readMfug2(){

        axios.get("http://192.168.127.105:8080/zn9_PipeUpload/read_php/read_mfug.php?action=read").then(function(response) {


          this.databaseList2 =  response.data.show_all_mfug  ;


          console.log("ABCCC. ", this.databaseList2 );
          
        }.bind(this));

      },
      readMaterial(){

        axios.get("http://192.168.127.105:8080/zn9_PipeUpload/read_php/read_material.php?action=read").then(function(response) {


          this.databaseListMaterial =  response.data.show_all_material  ;


          console.log("CC. ", this.databaseListMaterial );
          
        }.bind(this));

      },


      readCatagory(){

        axios.get("http://192.168.127.105:8080/zn9_PipeUpload/read_php/read_catagory.php?action=read").then(function(response) {



          this.databaseListCatagory =  response.data.show_all_catagory  ;


          console.log("BB. ", this.databaseListCatagory );
          
        }.bind(this));

      },

      readSubCatagory(){

        axios.get("http://192.168.127.105:8080/zn9_PipeUpload/read_php/read_subcatagory.php?action=read").then(function(response) {
          this.databaseList =  response.data.show_all_mfug  ;


          this.databaseListSubCatagory =  response.data.show_all_subcatagory  ;


          console.log("DD. ", this.databaseListSubCatagory );
          
        }.bind(this));

      },

      readItem(){

        axios.get ("http://192.168.127.105:8080/zn9_PipeUpload/read_php/read_item.php?action=read").then(function(response) {


          this.databaseListItem =  response.data.show_all_item  ;


          console.log("EE. ", this.databaseListItem );
          
        }.bind(this));

      },

      //comming soon.
      readOneItem(show_one_item){

        app.one_item = show_one_item;
        

        axios.get ("http://192.168.127.105:8080/zn9_PipeUpload/read_php/read_specific_item.php?action=read").then(function(response) {


          this.databaseListOneItem =  response.data.show_one_item  ;


          console.log("FF. ", this.databaseListOneItem );
          
        }.bind(this));

      },

      //1
      submitManufacturer(){

        app.errorMessage = "";
        app.successMessage = "";

        let formData1 = convertToFormData(app.inputt);

        this.axios.post("http://192.168.127.105:8080/zn9_PipeUpload/php/mfug.php?action=create", formData1 ).then(function(response){ 
          
          if (response.data.error){

            app.errorMessage = response.data.message;

          }

          else{

            app.successMessage = response.data.message;
          }

        });
      },
      //2
      submitMaterial(){

        app.errorMessage = "";
        app.successMessage = "";

        let formData2 = convertToFormData(app.inputt_material);

        
        axios.post("http://192.168.127.105:8080/zn9_PipeUpload/php/material.php?action=create", formData2 ).then(function(response){
          
          if (response.data.error){

            app.errorMessage = response.data.message;
          }

          else{
            app.successMessage = response.data.message;
          }

        });
        
      },
      //3
      submitCatagory(){
        app.errorMessage = "";
        app.successMessage = "";



        let formData3 = convertToFormData(app.inputt_catagory);

        
        axios.post("http://192.168.127.105:8080/zn9_PipeUpload/php/catagory.php?action=create", formData3 ).then(function(response){ //find correct url
          
          if (response.data.error){
            app.errorMessage = response.data.message;
          }

          else{
            app.successMessage = response.data.message;
          }

        });
        
      },

      //4
      submitSubCatagory(){
        app.errorMessage = "";
        app.successMessage = "";

        if (document.getElementById("check_select_cat").value == 'undefined' || document.getElementById("check_select_cat").value == null ) {
          if(document.body.contains(document.getElementById('my_id'))){ //
            console.log("select_cat erorr pre existed");
          }
          else{
            var z = document.createElement('p')
            z.setAttribute("id", "my_id");
            z.innerHTML = 'Choose Catagory Above.';

            const menu = document.querySelector('.err_not_chosen_cat');
            menu.appendChild(z);
            alert("Select Subcatagory in catagroy");

          }
          
        }
        
        else{
          let formData4 = this.convertToFormData(app.inputt_subcatagory);
          
          axios.post("http://localhost/products_db/php/subcatagory.php?action=create", formData4 ).then(function(response){ //find correct url
            
            if (response.data.error){

              app.errorMessage = response.data.message;

            }

            else{

              app.successMessage = response.data.message;

            }

          });
          
        }
        
      },
      //5
      submitItem(){
        app.errorMessage = "";
        app.successMessage = "";

        let formData5 = this.convertToFormData(app.inputt_item);

        axios.post("http://localhost/products_db/php/item.php?action=create", formData5 ).then(function(response){ //find correct url
          
          if (response.data.error){

            app.errorMessage = response.data.message;
          }

          else{
            app.successMessage = response.data.message;
          }

        });
      },
      
      doSomeWork(data){
        this.eachItem = data
      },

      editItem(){
        let formData6 = this.convertToFormData(app.inputt_edititem);
        axios.post("http://localhost/products_db/update_php/update_item.php?action=update", formData6 ).then(function(response){ //find correct url
          
          if (response.data.error){
            
            app.errorMessage = response.data.message;
          }

          else{
            app.successMessage = response.data.message;
          }

        });
      },

      showDynamicItem(data){

        console.log(" -----> " + data.itemkey);

        this.modalInfo.itemname = data.itemname;
        this.modalInfo.itemkey = data.itemkey;
        this.modalInfo.itemdescription = data.itemdescription;
        this.modalInfo.itemvariant = data.itemvariant;
        this.modalText = 'text-to-show-thisssssssss';
      },

      deleteItem(itemkey){

        

        
        axios.get("http://localhost/products_db/delete_php/delete_item.php", {

          params: {
            itemkey: itemkey
          }

        })
        .then(function(response){
          console.log(response.data);
          

        })
        .catch(function (error) {
          console.log("ERROR GET_TEMPLETE(CPY).PHP    ");


      }); 
        
      },
      convertToFormData(data){
        let fd = new FormData();

        for(value in data){
          fd.append(value, data[value]);
        }
      },

    }
  });