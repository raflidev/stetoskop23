<div class="fixed w-2/12 bg-orange-500 top-0 left-0">
  <div class="w-full px-5 h-screen " id="sidebar">
    <div class="my-5 px-4">
      <h1 class="font-bold text-2xl text-orange-100">VAMIC</h1>
      <p class="-mt-1 font-medium text-orange-100 text-sm">Valvular Monitoring System</p>
    </div>
  
    <div class="space-y-5">
      <div>
        <div class="font-medium text-orange-300 text-sm uppercase mb-4 px-4">Dashboard</div>
        <div class="space-y-4">
          <x-button-link title="Home" route="dashboard" href="dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
          </x-button-link>
        </div>
      </div>
    
      <div>
        <div class="font-medium text-orange-300 text-sm uppercase mb-4 px-4">Diagnoses</div>
        <div class="space-y-4">
          <x-button-link title="My Diagnoses" route="prediksi.check_index" href="ownCheck">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
            </svg>    
          </x-button-link>
        </div>
      </div>
    
      <div>
        <div class="font-medium text-orange-300 text-sm uppercase mb-4 px-4">Account</div>
        <div class="space-y-4">
          <a href="#" class="rounded-sm  px-5 py-2 text-orange-100 font-medium flex space-x-3 items-center">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>            
            </div>
            <span>My Profile</span>
          </a>
        </div>
      </div>
    </div>
  
  
  </div>
</div>