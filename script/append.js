function checkValuable(name)
{
    var fs = require('fs');
    var filecat = fs.readFileSync(require('path').resolve(__dirname, '..') + "/links.txt", (err, data) => {
        if (err) throw err;
        // console.log(require('path').resolve(__dirname, '..'))
        return data.toString();
    })


    if (filecat.indexOf(name) >= 0){
        return false;
    } else{
        return true;
    }
}

function write(link, name) 
{

    if (checkValuable(name)) {
        var fs = require('fs');
        if (link.indexOf("://") <= 0){
            link = "http://" + link;
        }
        fs.appendFile(require('path').resolve(__dirname, '..') + "/links.txt", "\n" + name.normalize('NFC'), (err) => {
            if (err){
                window.alert(err);
            } else {
                fs.appendFile(require('path').resolve(__dirname, '..') + "/.htaccess", "\n" +"Redirect 302 /" + name.normalize('NFC') + " " + link , (err) => {
                    if (err){
                        window.alert(err);
                    } else {
                        window.alert("成功");
                    }
                })
            }
        })

    } else {
        window.alert("自訂連結使用過");
    }

}
