new Vue({

    el: "#app",

    data() {
      return {
        seen: false,
        showAlertGood: false,
        showAlertBad: false,
        
        databaseList: [],
        databaseListMaterial: [],
        databaseListCatagory: [],
        databaseListSubCatagory: [],
        databaseListItem: [],

        inputt: {mfug: ""},
        inputt_material: {material: ""},
        inputt_catagory: {catagory: ""},
        inputt_subcatagory: {subcatagory: ""},
        inputt_item: {item: ""} //new to be more
      };
    },
    
    mounted(){
      this.readMfug();
    },
    
    methods:{

      readMfug(){
        //{headers: {'Content-Type': 'application/json'}
        axios.get("http://localhost/products_db/read_php/read_mfug.php?action=read").then(function(response){
          let json = response.data;

          if (response.data.error){
            app.errorMessage = response.data.message;
            app.databaseList = response.data.users;
            console.log("NO", response.data.error);
          }

          else{
            app.successMessage = response.data.message;
            console.log("YES", json);
          }

          
        });

      },
      
      //1
      submitManufacturer(){

        app.errorMessage = "";
        app.successMessage = "";

        let formData1 = convertToFormData(app.inputt);

        this.axios.post("http://localhost/products_db/php/mfug.php?action=create", formData1 ).then(function(response){ //find correct url
          
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

        let formData2 = this.convertToFormData(app.inputt);

        this.axios.post("http://localhost/products_db/php/material.php?action=create", formData2 ).then(function(response){ //find correct url
          
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

        let formData3 = convertToFormData(app.inputt);

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

        let formData4 = convertToFormData(app.inputt);

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

        let formData5 = convertToFormData(app.inputt);

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