window.onload=function(){


    var addRank = document.getElementById('addRank');

    (function() {
        String.prototype.trim = function (char, type) {
            if (char) {
              if (type == 'left') {
                return this.replace(new RegExp('^\\'+char+'+', 'g'), '');
              } else if (type == 'right') {
                return this.replace(new RegExp('\\'+char+'+$', 'g'), '');
              }
              return this.replace(new RegExp('^\\'+char+'+|\\'+char+'+$', 'g'), '');
            }
            return this.replace(/^\s+|\s+$/g, '');
          };

          var url = window.location.pathname.trim("/");
          var patharr = url.split("/");
          var parameter = '';
          var type = '';  //标示是支付宝支付还是微信支付 ０支付宝, 1微信

          if(patharr.length % 2 == 0) {
            parameter = decodeURI(patharr[patharr.length - 1]);
            type = patharr[patharr.length - 2];
          }
        
          axios.post('/admin/order/findThree').then(function(response) {
            if(response.data.code == 0) {
                var tbody = document.getElementById('tbody');
                console.log(response.data.result);
                for(var i = 0;i < response.data.result.length;i++) {
                    var tr = document.createElement('tr');
                    tr.style.color = "#76BF51";
                    var th = document.createElement("th");
                    var td1 = document.createElement("td");
                    var td2 = document.createElement("td");
                    th.innerHTML = response.data.result[i].rank;
                    td1.innerHTML = response.data.result[i].name;
                    td2.innerHTML = parseFloat(response.data.result[i].sumtotal).toFixed(2) + '元';
                    tr.appendChild(th);
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tbody.appendChild(tr);
                }
            }
          });
          if(parameter != '') {
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            if(type == 0) {
                axios.post('/admin/order/findPersonal',{
                    trade : parameter,
                    _token:token
                }).then(function(response) {
                    if(response.data.code == 0) {
                        insertMy(response.data.result);
                    }
                })
            }else if(type == 1) {
                axios.post('/admin/order/findPersonal',{
                    name : parameter,
                    _token:token
                }).then(function(response) {
                    if(response.data.code == 0) {
                        
                        insertMy(response.data.result);
                    }
                })
            }
          }

          function insertMy(my) {
              var content = document.getElementById("content");
              var p = document.createElement("p");
              p.innerHTML = '你当前的捐款排名为：' + my.rank;
              content.appendChild(p);
          }
    })();

    addRank.onclick = function() {
        window.location.href = '/front/celebration';
    }
}