<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <button onclick="load_data()">Load Data</button><br>
    year:<br>
    <select name="" id="sel_year" onchange="load_title()"></select><br>
    movie title:<br>
    <select name="" id="movie_title" onchange="load_cast()"></select><br>
    <textarea name="" id="movie_cast" cols="30" rows="10">
    </textarea><br>
    <input type="text" name="" id="grendle">
    <div id="out"></div>
    <script>
        let jsonEx;
        function load_data(){
            jsonEx = <?= file_get_contents("json/movies.json") ?>;
            var movie_year = new Set();
            var doc = document.getElementById("sel_year");
            for(i = 0 ; i < jsonEx.length ; i++){
                movie_year.add(jsonEx[i].year);
            }
            const ref_year = movie_year.values();
            for(y = 0; y < movie_year.size; y++){
                var option = document.createElement("option");
                option.text = ref_year.next().value;
                doc.add(option);
            }
            load_title();
            return jsonEx;
        }

        function load_title(){
            var doc = document.getElementById("movie_title");
            var y = document.getElementById("sel_year");
            doc.innerHTML = "";
            for(i = 0 ; i < jsonEx.length ; i++){
                if(jsonEx[i].year == y.value){
                    var option = document.createElement("option");
                    option.text = jsonEx[i].title;
                    doc.add(option);
                }
            }
        }

        function load_cast(){
            var t = document.getElementById("movie_title");
            document.getElementById("movie_cast").value = "";
            document.getElementById("grendle").value = "";
            for(i = 0 ; i < jsonEx.length ; i++){
                if(jsonEx[i].title == t.value){
                    for(j = 0; j < jsonEx[i].cast.length; j++){
                        document.getElementById("movie_cast").value += jsonEx[i].cast[j] + "\n";
                    }
                    document.getElementById("grendle").value = jsonEx[i].genres;
                }
            }
        }

    </script>
</body>
</html>