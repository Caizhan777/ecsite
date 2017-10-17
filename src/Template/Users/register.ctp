<div class="container-fluid inner">

  <div id="main">

      <div id="main_middle">
          <h1 class="page-heading">新規会員登録</h1>
          <div id="top_wrap" class="container-fluid">
              <div id="top_box" class="row">
                  <div id="top_box__body" class="col-md-10 col-md-offset-1">
                      <?= $this->Form->create($user) ?>
                          <input type="hidden" id="entry__token" name="entry[_token]" value="rDDAiKiNx3Sq93Q1_Bdqw4A4Y_Keua5reuWQeg8Ov_4" />
                          <div id="top_box__body_inner" class="dl_table">
                              <dl id="top_box__name">
                                  <dt><label class="control-label required">お名前</label><span class="required">必須</span></dt>
                                  <dd class="form-group input_name">
                                      <input type="text" id="user_name" name="user_name" required="required" placeholder="お名前" class="form-control" />
                                  </dd>
                              </dl>

                              <dl id="top_box__address_detail">
                                  <dt><label class="control-label required">住所</label><span class="required">必須</span></dt>
                                  <dd>
                                      <div id="top_box__address" class="">
                                        <div class="form-group">
                                          <input type="text" id="user_address" name="user_address" required="required" style="ime-mode: active;" placeholder="住所" class="form-control" /><br />
                                        </div>
                                      </div>
                                  </dd>
                              </dl>
                              <dl id="top_box__tel">
                                  <dt><label class="control-label required">電話番号</label><span class="required">必須</span></dt>
                                  <dd>
                                      <div class="form-inline form-group input_tel">
                                          <input type="text" id="user_tel" name="user_tel" required="required" class="form-control" />
                                      </div>
                                  </dd>
                              </dl>

                              <dl id="top_box__email">
                                  <dt><label class="control-label required">メールアドレス</label><span class="required">必須</span></dt>
                                  <dd>
                                      <div class="form-group ">
                                          <input type="text" id="user_email" name="user_email" required="required" class="form-control" />
                                      </div>
                                      <div class="form-group ">
                                          <input type="text" id="user_email_second" name="user_email_second" required="required" placeholder="確認のためもう一度入力してください" class="form-control" />
                                      </div>
                                  </dd>
                              </dl>
                              <dl id="top_box__password">
                                  <dt><label class="control-label required">パスワード</label><span class="required">必須</span></dt>
                                  <dd>
                                                                  <div class="form-group ">
                                          <input type="password" id="user_password" name="user_password" required="required" placeholder="半角英数字記号8～32文字" class="form-control" />

                                      </div>
                                                                  <div class="form-group ">
                                          <input type="password" id="user_password_second" name="user_password_second" required="required" placeholder="確認のためもう一度入力してください" class="form-control" />

                                      </div>
                                  </dd>
                              </dl>
                          </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              <input id="top_box__hidden_mode" type="hidden" name="mode" value="confirm">
                          <p id="top_box__agreement" class="form_terms_link"><a href="" target="_blank">利用規約</a>に同意してお進みください
                          </p>

                          <div id="top_box__footer" class="row no-padding">
                              <div id="top_box__button_menu" class="btn_group col-sm-offset-4 col-sm-4">
                                  <p>
                                      <button type="submit" class="btn btn-primary btn-block">同意する</button>
                                  </p>
                                  <p><a href="" class="btn btn-info btn-block">同意しない</a></p>
                              </div>
                          </div>
                      <?= $this->Form->end() ?>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
      </div>

  </div>

</div>
