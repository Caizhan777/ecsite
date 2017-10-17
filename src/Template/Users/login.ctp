  <div class="container-fluid inner">

      <div id="main">

          <div id="main_middle">
              <h1 class="page-heading">ログイン</h1>
              <div class="container-fluid">
                <?= $this->Form->create() ?>
                          <div id="login_box" class="row">
                            <div id="mypage_login_wrap" class="col-sm-8 col-sm-offset-2">
                                <div id="mypage_login_box" class="column">

                                    <div id="mypage_login_box__body" class="column_inner clearfix">
                                        <div class="icon"><svg class="cb cb-user-circle"><use xlink:href="#cb-user-circle" /></svg></div>
                                        <div id="mypage_login_box__login_email" class="form-group">
                                            <input type="text" id="user_email" name="user_email" required="required" max_length="320" style="ime-mode: disabled;" placeholder="メールアドレス" autofocus="autofocus" class="form-control" />
                                        </div>
                                        <div id="mypage_login_box__login_pass" class="form-group">
                                            <input type="password" id="user_password" name="user_password" required="required" max_length="320" placeholder="パスワード" class="form-control" />
                                        </div>
                                        <div class="extra-form form-group">
                                                                                                                                                                                                                                                                                    </div>
                                        <div id="mypage_login__login_button" class="btn_area">
                                            <p><button type="submit" class="btn btn-info btn-block btn-lg">ログイン</button></p>
                                            <ul id="mypage_login__login_menu" >
                                                <li><a href="">ログイン情報をお忘れですか？</a></li>
                                                <li><a href="">新規会員登録</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <input type="hidden" name="_csrf_token" value="aXv5P-l4XwOBG6BEZmhx9waH1JU_I88SqI4htMpvIEc">
                <?= $this->Form->end() ?>
              </div>
          </div>

      </div>
  </div>
