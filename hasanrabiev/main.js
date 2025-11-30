// main.js - simple interactions: search redirect, chat widget, header search proxy
document.addEventListener('DOMContentLoaded', function(){
  const siteSearch = document.getElementById('site-search');
  if(siteSearch){
    siteSearch.addEventListener('keydown', function(e){
      if (e.key === 'Enter') {
        const q = siteSearch.value.trim();
        if (q) {
          // go to scholarships page and set localStorage key so page can apply filter
          localStorage.setItem('scholarship_search', q);
          window.location.href = '/agen-beasiswa/scholarships.php';
        }
      }
    });
  }

  // apply search from header on scholarships page
  const searchInput = document.getElementById('search-input');
  if (searchInput) {
    const q = localStorage.getItem('scholarship_search');
    if (q) {
      searchInput.value = q;
      localStorage.removeItem('scholarship_search');
      // trigger input event to filter
      searchInput.dispatchEvent(new Event('input'));
    }
  }

  // chat widget
  const openChat = document.getElementById('open-chat');
  const chatWidget = document.getElementById('chat-widget');
  const closeChat = document.getElementById('close-chat');
  const chatSend = document.getElementById('chat-send');
  const chatInput = document.getElementById('chat-input');
  const chatBody = document.getElementById('chat-body');

  if(openChat && chatWidget){
    openChat.addEventListener('click', ()=> {
      chatWidget.classList.remove('chat-hidden');
      chatWidget.style.display = 'flex';
    });
  }
  if(closeChat){
    closeChat.addEventListener('click', ()=> chatWidget.style.display='none');
  }
  if(chatSend){
    chatSend.addEventListener('click', ()=> {
      const text = chatInput.value.trim();
      if(!text) return;
      const userDiv = document.createElement('div'); userDiv.className='user'; userDiv.textContent=text;
      chatBody.appendChild(userDiv);
      chatInput.value='';
      // simple bot reply (placeholder)
      setTimeout(()=> {
        const bot = document.createElement('div'); bot.className='bot';
        bot.textContent = 'Terima kasih, kami sudah menerima pertanyaan Anda. Tim akan menghubungi dalam 1x24 jam (simulasi).';
        chatBody.appendChild(bot);
        chatBody.scrollTop = chatBody.scrollHeight;
      }, 700);
    });
  }
});
// Mobile menu toggle
const toggle = document.getElementById('menu-toggle');
const navbar = document.getElementById('navbar');
if (toggle && navbar) {
  toggle.addEventListener('click', () => {
    navbar.classList.toggle('active');
  });
}
