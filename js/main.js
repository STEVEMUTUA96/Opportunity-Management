// url for connection

var url = "./backend/api.php"

//userLogin

function login() {
  var username, password;
  username = $('#username').val();
  password = $('#password').val();
  console.log(username);


  $.post(url, {
    action: 'userLogin',
    username: username,
    password: password,
  }, function (data) {
    if (data.success) {
      alert("Success");
      window.location.replace("dashboard.html")
    } else {
      alert('failed');
    }
  }, "json");
}


// userRegister
function register() {
  var username, password;
  username = $('#inputuser').val();
  password = $('#inputPws').val();

  console.log(username);


  $.post(url, {
    action: 'userRegister',
    username: username,
    password: password,
  }, function (data) {
    if (data.success) {
      alert("Success");
      $('#inputuser').val('');
      $('#inputPws').val('');
    } else {
      alert('failed');
    }
  }, "json");
}


//getaccounts data from database


function getAccounts() {
  $.getJSON(url, {
    action: 'getAccounts'
  }, function (data) {
    var content = '';
    for (var i = 0; i < data.length; i++) {
      var dt = data[i];
      content += `<tr>
            <td>${dt.name}</td>
            <td>${dt.address}</td>
            <td>${dt.city}</td>
            <td>${dt.phone}</td>
            <td>${dt.date}</td>
          </tr>`;
    }
    $('#tbbody').html(content);
  });
}




function getOpportunities() {
  $.getJSON(url, {
    action: 'getOpportunities'
  }, function (data) {
    console.log(data);
    var content = '';
    for (var i = 0; i < data.length; i++) {
      var dt = data[i];
      content += `<tr>
                        <td>${dt.name}</td>
                        <td>${dt.title}</td>
                        <td>${dt.amount}</td>
                        <td>${dt.stage}</td>
                        <td>${dt.date}</td>
                    </tr>`;
    }
    $('#opp').html(content);
  });
}




function addAccounts() {
  var name, address, city, phone;
  name = $('#name').val();
  address = $('#address').val();
  city = $('#city').val();
  phone = $('#phone').val();

  //validate here

  $.post(url, {
    action: 'addAccounts',
    name: name,
    address: address,
    city: city,
    phone: phone
  }, function (data) {
    if (data.success) {
      alert("Success");
    } else {
      alert('failed');
    }
  }, "json");

}

function addOpportunity() {
  var accountId, title, amount, stage;
  accountId = $('#accountId').val();
  title = $('#title').val();
  amount = $('#amount').val();
  stage = $('#stage').val();
  console.log(accountId);


  $.post(url, {
    action: 'addOpportunity',
    accountid: accountId,
    title: title,
    amount: amount,
    stage: stage
  }, function (data) {
    if (data.success) {
      alert("Success");
    } else {
      alert('failed');
    }
  }, "json");


}
function editOpportunity() {
  var id, accountId, title, amount, stage;
  id = $('#id').val();
  accountId = $('#accountId').val();
  title = $('#title').val();
  amount = $('#amount').val();
  stage = $('#stage').val();



  $.post(url, {
    id: id,
    action: 'addOpportunity',
    accountid: accountId,
    title: title,
    amount: amount,
    stage: stage
  }, function (data) {
    if (data.success) {
      alert("Success");
    } else {
      alert('failed');
    }
  }, "json");

}





function getAccountsPopulateSelect() {
  $.getJSON(url, {
    action: 'getAccounts'
  }, function (data) {
    var content = '';
    for (var i = 0; i < data.length; i++) {
      var dt = data[i];
      content += ` <option value="${dt.id}">${dt.name}</option>`;
    }
    $('#accountId').html(content);
  });
}



function goBack() {
  window.location.replace("index.html")
}





