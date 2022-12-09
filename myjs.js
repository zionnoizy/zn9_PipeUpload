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

        inputt: {mfug: ""},
        inputt_material: {material: ""},
        inputt_catagory: {catagory: ""},
        inputt_subcatagory: {subcatagory: ""},
        inputt_item: {item: ""}, //new to be more

        selected: {}
      };
    },
    
    mounted(){
      this.readMfug();
    },
    
    methods:{

      readMfug(){
        //{headers: {'Content-Type': 'application/json'}


        axios.get("http://localhost/products_db/read_php/read_mfug.php?action=read").then(function(response) {
          let json = response.data;
          this.databaseList = response.data.show_all_mfug;

          console.log("AA. ", app.databaseList );



          //databaseList.push("AAA");
          //console.log("db", app.databaseList);
          /*
          for (let i=0; i < json.length; ++i){

            app.databaseList = (json[i].MFUG_NAME);

            console.log("><", this.databaseList);

          }


          console.log("><b", this.databaseList);



          if (response.data.error){
            app.errorMessage = response.data.message;
            app.databaseList = response.data.inputt;
            console.log("NO Readed, ", response.data.error );
          }

          else{
            app.successMessage = response.data.message;
            app.databaseList = json.show_all_mfug;

            console.log("YES Readed4, ", json.show_all_mfug   );
          }
          */
          
        }.bind(this));

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

        let formData2 = this.convertToFormData(app.inputt_material);

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

        let formData4 = convertToFormData(app.inputt_subcatagory);

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