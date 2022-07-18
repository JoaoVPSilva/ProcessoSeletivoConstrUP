<template>
  <div class="class_list container_search ">
    
    <div class="d-md-block">
      <button @click="create" type="button" class="btn btn-dark btn-sm" >
        Exibir Lista
    </button>
    </div>
    <hr>

    <div class="" style="margin:50px">
      <div class="table-responsive">
       <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Marca</th>
            <th scope="col">Valor</th>
            <th scope="col">Data</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
        <tr v-for="lista in listagem" :key="lista.id">
          <td>{{lista.id}} </td>
          <td>{{lista.nome}}</td>
          <td>{{lista.descricao}}</td>
          <td>{{lista.modal}}</td>
          <td>{{lista.valor}}</td>
          <td>{{lista.created_at}}</td>
          <td>
             <div>
              <div v-if="excluido" class="alert alert-success">
                Excluido!
              </div>
                <a @click="excluir" class="btn btn-outline-light justify-content-end m-1" href="#" title="Excluir">Excluir</a>                
                <router-link class="btn btn-outline-light m-1" data-bs-toggle="modal" data-bs-target="#staticEditModal"   :to="{name:'editar', params:{usuario:lista.id}}">
                Editar
              </router-link>
            </div>
          </td>
        </tr>          
      </tbody>
      </table>
  </div>
    </div>

  <div class="modal fade" id="staticEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Editar dados </h5>
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


  </div>

</template>

<script>

export default {
  name: 'listaData',
  props: {

    msg: String
  },

  data: function(){ //isso que vai para o banco de dados
      return{
          listagem:[],
          name:'',
          descricao:'',
          modal:'',
          valor:'',
          excluido: false
          // showMordal: false
      }
    }, 
    methods:{       
        getListagem(){
        //   requisição pro backend
            this.$http.get('lista').then((response)=>{
                this.listagem = response.data
            })
        },
        create(){
            this.getListagem()          
        },        
        removeComment(index){
            console.log(index);
            this.listagem.splice(index, 1);
        },
        getUser(){
            this.$http.get(`editar/${this.$route.params.usuario}`)
        },
        excluir(){
        this.$http.delete(`delete/${this.route.params.usuario}`).then((response)=>{
            if(response.data == 'success'){
                this.excluido = true
            }
      });
    },
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
