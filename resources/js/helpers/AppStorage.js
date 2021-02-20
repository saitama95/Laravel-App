class AppStorage{
    storeToken(token){
        localStorage.setItem('token',token)
    }
    storeName(username){
        localStorage.setItem('username',username)
    }
    storeId(user_id){
        localStorage.setItem('user_id',user_id)
    }
    store(token,username,user_id){
        this.storeToken(token)
        this.storeName(username)
        this.storeId(user_id)
    }
    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('username')
        localStorage.removeItem('user_id')
    }
    getToken(){
        return localStorage.getItem('token')
    }
    getUser(){
        return localStorage.getItem('username')
    }
    getId(){
        return localStorage.getItem('user_id')
    }
}
export default AppStorage=new AppStorage();