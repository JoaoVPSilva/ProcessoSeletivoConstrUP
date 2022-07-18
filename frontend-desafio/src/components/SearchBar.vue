<template>
  <div class="class_teste container_search ">
        <!-- <h1 class="border-bottom display-5">Lista de Materiais</h1>                -->
        
        <img src="up.png" class="img-fluid" alt="Responsive image"> 
        <br>
        <!-- Form - preencher -->
        <!-- Button trigger modal -->
        <br><br><br>
        <div>
            <button type="button" class="btn btn-dark  btn-lg m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Adicionar
            </button>                  
        </div>

        <br>
        <hr>
        <br>
        
            
        <!-- Modal - Adicionar -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Materiais</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form      -->
                <div class="form-todo form-group" id="form_constr">                
                    <p>
                    <input placeholder="Nome" type="text" name="author" class="form-control form-control-sm" v-model="name" />
                    </p>
                    
                    <p>
                    <textarea placeholder="Descrição" name="message"  class="form-control from-control-sm" v-model="descricao"></textarea>
                    </p>
                    
                    <p>
                    <input placeholder="Marca" type="text" name="author" class="form-control form-control-sm" v-model="modal" />
                    </p>

                    <p>
                    <input placeholder="Valor" type="text" name="author" class="form-control form-control-sm" v-model="valor" />
                    </p>
                    <div class="modal-footer">
                      <button v-on:click="addComment" type="submit" class="btn btn-dark">Comentar</button>
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div> 
                   
                </div>
                <!-- End Form      -->
                    

            </div>

        </div>
        </div>
        </div>
        <!-- end form -->


  
  </div>

</template>

<script>

export default {
  name: 'SearchBar',
  props: {

    msg: String
  },

  data: function(){ //isso que vai para o banco de dados
      return{
          listagem:[],
          name:'',
          descricao:'',
          modal:'',
          valor:''
          // showMordal: false
      }
    }, 
    methods:{       
      addComment(){
            // receber e gravar na base
            var data = {
              name: this.name,
              descricao: this.descricao,
              modal: this.modal,
              valor: this.valor              
          }
            //chamando backend
          this.$http.post('adicionar', data).then((response)=>{
            console.log(response)
          })

          // validação para nao permitir comentario vazio
          if(this.descricao.trim() === '' || this.name.trim() === '' || this.modal.trim() === '' || this.valor.trim() === ''){
              return;
          }
        
          console.log("Chamado!");
          console.log(this.name);
          console.log(this.descricao);   
          console.log(this.modal);    
          console.log(this.valor);

          // para deixar o campo vazio apos comentar
          //caminho inverso do metodo de cima  (altera o modulo e interfere ne inteface)
          this.name = '';
          this.descricao = '';
          this.modal = '';
          this.valor = '';

        },       
      // precisa da posição do comentario do array
      // funcao para remover 

    },
    
    watch: {
      comment(val){
          console.log('val',val)
      }
      
    },
    

    
  // })
}
</script>

<style >

</style>
