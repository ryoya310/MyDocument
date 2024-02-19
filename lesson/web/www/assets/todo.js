var endPoint = 'https://brownsnake2.sakura.ne.jp/ryoya/api/todo/'

var userIdElement = document.getElementById('user_id')
selectTodo(userIdElement.value)

function selectTodo(user_id) {
  fetch(`${endPoint}select.php?user_id=${user_id}`, {
    method: 'GET'
  })
  .then(response => response.json())
  .then(data => {
    if (data.list) {
      const listContainer = document.getElementById('lists')
      listContainer.innerHTML = ''
      data.list.forEach(itemHtml => {
        listContainer.innerHTML += itemHtml
      })
      const listItems = listContainer.querySelectorAll('li')
      listItems.forEach(item => item.classList.add('fade-in'))
    }
  })
  .catch(error => {
    console.error('Error:', error)
    alert('エラーが発生しました')
  })
}

function insertTodo() {
  var formData = new FormData(document.getElementById('form'))
  fetch(`${endPoint}insert.php`, {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    console.log(data)
    if (data.result) {
      alert('登録に成功しました')
      selectTodo(userIdElement.value)
    } else {
      alert('登録に失敗しました: ' + data.error)
    }
  })
  .catch(error => {
    console.error('Error:', error)
    alert('エラーが発生しました')
  })
}

function deleteTodo(id) {

  if (!confirm('このデータを削除しますか？')) {
    return false
  }
  var formData = new FormData()
  formData.append('id', id)
  fetch(`${endPoint}delete.php`, {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    console.log(data)
    if (data.result) {
      alert('削除に成功しました')
      selectTodo(userIdElement.value)
    } else {
      alert('削除に失敗しました: ' + data.error)
    }
  })
  .catch(error => {
    console.error('Error:', error)
    alert('エラーが発生しました')
  })
}
