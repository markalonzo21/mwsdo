function create_php(e){
            var len=document.getElementById(e).getElementsByClassName('php').length;
            var data="function validate_data($data,$con){\n return mysqli_real_escape_string($con,htmlentities($data));\n}\n\n";
            var data_type='';
            var qry="";
            var sql="$sql='insert into tbl_name values(";
            for(var i=0;i<len;i++){
                let n=document.getElementById(e).getElementsByClassName('php')[i].name;
                data_type+=document.getElementById(e).getElementsByClassName('php')[i].getAttribute('d');
                data+="$"+(n)+"=validate_data($_POST['"+n+"'],$con);\n";
                qry+="$"+(n);
                sql+='?';
                if(i!=len-1){
                    qry+=",";
                    sql+=',';
                }
                else{
                    let q="$qry_bind_param('"+data_type+"',"+qry+");";
                    sql+=")';\n"
                    qry=q;
                }
            }
            data+=sql+"\n"+qry+"\nif($qry->execute()){\n}";
            console.log(data);
}