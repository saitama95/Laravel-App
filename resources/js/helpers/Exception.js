import User from './User'
class Exceptions{
    handle(error){
        console.log('hello')
        this.isExpired(error.response.data.error);
    }
    isExpired(error){
        console.log(error)
        if(error === 'Token is Expire'){
            User.logout()
        }
    }
}
export default Exceptions=new Exceptions()