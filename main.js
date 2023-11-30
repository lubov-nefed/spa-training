let links = null;

let loaded = true;

let data = {
  title: "",
  body: "",
  link: ""
};

let page = {
  title: document.getElementById("title"),
  body: document.getElementById("body")
};
/* 
function GetData(response, link) {
  data = {
    title: response.title,
    body: response.body,
    link: link
  }
  UpdatePage();//3
} */

function SendRequest(query, link) {
  console.log('executed');
  console.log(link);
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "core.php" + query, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState != 4) return;
    loaded = true;
    if (xhr.status == 200) { 
      console.log('200');
      console.log(JSON.parse(xhr.responseText));
     /*  GetData(JSON.parse(xhr.responseText), link) *///2
    }
  }
};

const LinkClick = (href) => (event) => {
  event.preventDefault();
  let props = href.split("/");
  console.log(props);// ['', 'Articles', '1'] or  ['', 'Main']
  switch(props[1])// при нажатии на ссылку на главной странице props = 'Articles'
  {
    case "Main":
      console.log(href);
      SendRequest("?page=main", href); //Отправляем запрос на сервер
      break;

    case "Articles"://Проверяем валидность идентификатора и тоже отправляем запрос
      if(props.length == 3 && !isNaN(props[2]) && Number(props[2]) > 0) //изменить под свои условия
      {
        SendRequest("?page=articles&id=" + props[2], href);//?page=articles&id=pricing изменить под свои условия
      }
      break;
  }
  
}

function InitLinks() {
  links = document.querySelectorAll(".link_internal");
  links.forEach(link => link.addEventListener("click", LinkClick(link.getAttribute("href"))));
}

/* function UpdatePage() {
  page.title.innerText = data.title;
  page.body.innerHTML = data.body;

  document.title = data.title;
  window.history.pushState(data.body, data.title, "/spa" + data.link);
  InitLinks();// 4
} */

InitLinks();