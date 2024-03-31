let message = document.getElementById('message')
if(message){
    setTimeout(()=>{
        message.style.display = 'none'
    },5000)
}
const auto_resize_textarea = document.querySelector('#post')
auto_resize_textarea.addEventListener("input", (e) => {
    auto_resize_textarea.style.height = `59px`
    let scHight = e.target.scrollHeight;
    auto_resize_textarea.style.height = `${scHight}px`
})
function init_delete(ele,ind){
    const cancel = document.querySelector(`.cancel_id_${ind}`)
    const confirm = document.querySelector(`.confirm_id_${ind}`)
    ele.style.display = 'none'
    cancel.style.display = 'inline-block'
    confirm.style.display = 'inline-block'
    cancel.addEventListener('click',(e)=>{
        e.target.style.display = 'none'
        confirm.style.display = 'none'
        ele.style.display = 'inline-block'
    })
}