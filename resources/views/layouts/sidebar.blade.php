      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
                @if ( session('user_photo') )
                    <img class="img-circle" src="{{ asset('images/user.png') }}" alt="User Image">
                @ELSE
                    <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
                @ENDIF
            </div>
            <div class="pull-left info">
              <p>{{ session('user_name') }}</p>
              <p class="designation">{{ session('user_loged_in_as') }}</p>
            </div>
          </div>
            <?php echo App\Models\Menu::getSideMenu(); ?>
        </section>
      </aside>

