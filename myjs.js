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


        anotherdatabaseList: [] ,

        inputt: {mfug: ""},
        inputt_material: {material: ""},
        inputt_catagory: {catagory: ""},
        inputt_subcatagory: {subcatagoryname: "", choosen_catagory: ""},
        
        inputt_item: {itemname: "", itemcode: "", itemdescription: "", itemvariant: "", 
          choosen_mfug: "", choosen_material: "", choosen_catagory: "", choosen_subcatagory: "",
          itemimage: "", itemts: ""}, //new to be more

        selected: {}
      };
    },
    
    mounted(){
      this.readMfug();
      this.readMaterial();
      this.readCatagory();
      this.readSubCatagory();
    },
    
    methods:{
      
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;
        this.createImage(files[0]);
      },
      
      readMfug(){

        axios.get("http://localhost/products_db/read_php/read_mfug.php?action=read").then(function(response) {

          let json = response.data;

          this.databaseList =  response.data.show_all_mfug  ;
          //this.anotherDatabaseList =  JSON.parse(JSON.stringify(response.data.show_all_mfug))  ;

          console.log("AA. ", this.databaseList );
          
        }.bind(this));

      },

      readMaterial(){

        axios.get("http://localhost/products_db/read_php/read_material.php?action=read").then(function(response) {


          this.databaseListMaterial =  response.data.show_all_material  ;


          console.log("CC. ", this.databaseListMaterial );
          
        }.bind(this));

      },


      readCatagory(){

        axios.get("http://localhost/products_db/read_php/read_catagory.php?action=read").then(function(response) {



          this.databaseListCatagory =  response.data.show_all_catagory  ;


          console.log("BB. ", this.databaseListCatagory );
          
        }.bind(this));

      },

      readSubCatagory(){

        axios.get("http://localhost/products_db/read_php/read_subcatagory.php?action=read").then(function(response) {



          this.databaseListSubCatagory =  response.data.show_all_subcatagory  ;


          console.log("DD. ", this.databaseListSubCatagory );
          
        }.bind(this));

      },

      //1
      submitManufacturer(){

        app.errorMessage = "";
        app.successMessage = "";

        let formData1 = convertToFormData(app.inputt);

        this.axios.post("http://localhost/products_db/php/mfug.php?action=create", formData1 ).then(function(response){ 
          databaseListCatagory
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

        
        axios.post("http://localhost/products_db/php/material.php?action=create", formData2 ).then(function(response){
          
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

        
        axios.post("http://localhost/products_db/php/catagory.php?action=create", formData3 ).then(function(response){ //find correct url
          
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

        console.log(app.inputt_subcatagory);


        let formData4 = this.convertToFormData(app.inputt_subcatagory);

        axios.post("http://localhost/products_db/php/subcatagory.php?action=create", formData4 ).then(function(response){ //find correct url
          
          if (response.data.error){

            app.errorMessage = response.data.message;

          }

          else{

            app.successMessage = response.data.message;

          }

        });
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
      convertToFormData(data){
        let fd = new FormData();

        for(value in data){
          fd.append(value, data[value]);
        }
      }

      
      


    }
  });