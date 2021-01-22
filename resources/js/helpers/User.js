import Token from './Token'
import AppStorage from './AppStorage'
class User{
    login(data){
        axios.post('/api/auth/login',data)
            .then(response=>{
                response=this.responseAfterLogin(response)
          }).catch(error=>{
            console.log(error.data)
        })
    }
    responseAfterLogin(response){
        const access_token=response.data.access_token
        const username=response.data.username
        if(Token.isValid(access_token)){
            console.log(access_token)
            AppStorage.store(access_token,username)
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
        return AppStorage.clear()
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
}
export default User=new User();