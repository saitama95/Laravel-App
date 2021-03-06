<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home Page</h1>
   
</body>
<script>

const Http=new XMLHttpRequest();
const url='http://127.0.0.1:8000/api/question';
Http.open('GET',url);
Http.send();


Http.onreadystatechange = (e) => {
    
}
</script>
</html>