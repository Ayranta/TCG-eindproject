

    <h1 class="md:text-center text-4xl font-bold mb-8">Forgot Password</h1>

    <form method="post" action="/account/send-password-reset" class = "flex flex-col gap-4 w-80 md:max-w-2xl p-4 shadow-md rounded-2xl mx-auto mt-16">
      
        <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- Username -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">E-mail</span>
          </label>
          <input type="email" name="email"  class="input input-bordered w-full" required />
        </div>
    </div>
    <button name="send" class="btn btn-primary">send</button>
  </form>
