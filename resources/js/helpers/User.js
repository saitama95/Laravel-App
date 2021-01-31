import Token from './Token'
import AppStorage from './AppStorage'
class User{
    login(data){
        axios.post('/api/auth/login',data)
            .then(response=>{
                //console.log(response.data)
                response=this.responseAfterLogin(response)
          }).catch(error=>{
            console.log(error.data)
        })
    }
    responseAfterLogin(response){
        const access_token=response.data.access_token
        const username=response.data.username
        const user_id=response.data.id
        if(Token.isValid(access_token)){
           // console.log(access_token)
            AppStorage.store(access_token,username,user_id)
            window.location='/formu'
        }
    }
    //check in browser localstorage contain token is present or not
    hasToken(){
        const storeToken=AppStorage.getToken();
        if(storeToken){
            return Token.isValid(storeToken)? true : false
        }
        return 0
    }
    loggedIn(){
        return this.hasToken()
       
    }
    logout(){
         AppStorage.clear()
         window.location='/login'
    }
    name(){
        return AppStorage.getUser()
    }
    id(){
        if(this.loggedIn){
            const payload=Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }
    own(id){
        return this.id()===id
    }
    admin(){
        return this.id()==16
    }
}
export default User=new User();