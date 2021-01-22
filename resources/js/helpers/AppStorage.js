class AppStorage{
    storeToken(token){
        localStorage.setItem('token',token)
    }
    storeName(username){
        localStorage.setItem('username',username)
    }
    store(token,username){
        this.storeToken(token)
        this.storeName(username)
    }
    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('username')
    }
    getToken(){
        return localStorage.getItem('token')
    }
    getUser(){
        return localStorage.getItem('username')
    }
}
export default AppStorage=new AppStorage();