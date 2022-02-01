<template>
  <div class="re_contact_body common_body">
    <div>
      <div class="re_contact_step_body" data-aos="fade-right">
        <el-steps :active="step" simple v-if="ww>850">
          <el-step title="必要事項の入力" icon="el-icon-edit"></el-step>
          <el-step title="入力の内容確認" icon="el-icon-tickets"></el-step>
          <el-step title="送信完了" icon="el-icon-circle-check"></el-step>
        </el-steps>
        <el-steps :active="step" simple v-else>
          <el-step title="入力" icon="el-icon-edit"></el-step>
          <el-step title="確認" icon="el-icon-tickets"></el-step>
          <el-step title="完了" icon="el-icon-circle-check"></el-step>
        </el-steps>
      </div>
      <div>
        <div class="re_contact_form_body" v-show="step===0">
          <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="200px"
                   :label-position="ww>850?'left':'top'">
            <el-form-item label="お問い合わせ種類" prop="typeContact" data-aos="fade-right" :data-aos-duration="500">
              <el-radio-group v-model="ruleForm.typeContact">
                <el-radio v-for="(item,index) in radioList()" :key="index" :label="index">{{ item.called }}</el-radio>
              </el-radio-group>
            </el-form-item>
            <el-form-item label="お名前" prop="name">
              <el-input data-aos="fade-right" :data-aos-duration="500" v-model="ruleForm.name"
                        placeholder="(例) RE 太郎"></el-input>
            </el-form-item>
            <el-form-item label="お名前フリガナ" prop="nameFurigana">
              <el-input data-aos="fade-right" :data-aos-duration="500" v-model="ruleForm.nameFurigana"
                        placeholder="(例) RE タロウ"></el-input>
            </el-form-item>
            <el-form-item label="会社名" prop="companyName">
              <el-input v-model="ruleForm.companyName" :data-aos-duration="500" data-aos="fade-right"
                        placeholder="(例) REイニシアチブ株式会社"></el-input>
            </el-form-item>
            <el-form-item label="部署" prop="departmentName">
              <el-input v-model="ruleForm.departmentName" :data-aos-duration="500" data-aos="fade-right"
                        placeholder="(例) 営業部"></el-input>
            </el-form-item>
            <el-form-item label="役職" prop="positionName">
              <el-input v-model="ruleForm.positionName" :data-aos-duration="500" data-aos="fade-right"
                        placeholder="(例) 課長"></el-input>
            </el-form-item>
            <el-form-item label="住所（都道府県）" prop="address">
              <el-select v-model="ruleForm.address" :data-aos-duration="500" data-aos="fade-right"
                         placeholder="都道府県を選択してください">
                <el-option
                    v-for="(value, key, index) in options"
                    :key="index"
                    :label="value"
                    :value="value">
                </el-option>
              </el-select>
            </el-form-item>
            <el-form-item label="電話番号" class="is-required">
              <div class="re_contact_form_3" data-aos="fade-right" :data-aos-duration="500">
                <el-form-item prop="phone" class="phone_input_item">
                  <el-input type="tel" v-model="ruleForm.phone" @input="checkNumber('phone')" :maxlength="4"
                            placeholder="(例) 03"></el-input>
                </el-form-item>
                <span class="re_contact_form_-">-</span>
                <el-form-item prop="phone2" class="phone_input_item">
                  <el-input type="tel" v-model="ruleForm.phone2" @input="checkNumber('phone2')" :maxlength="4"
                            placeholder="(例) 6402"></el-input>
                </el-form-item>
                <span class="re_contact_form_-">-</span>
                <el-form-item prop="phone3" class="phone_input_item">
                  <el-input type="tel" v-model="ruleForm.phone3" @input="checkNumber('phone3')" :maxlength="4"
                            placeholder="(例) 3341"></el-input>
                </el-form-item>
              </div>
            </el-form-item>
            <el-form-item label="FAX" id="fax" prop="fax">
              <div class="re_contact_form_3" data-aos="fade-right" :data-aos-duration="500">
                <el-form-item prop="fax" class="phone_input_item">
                  <el-input type="tel" v-model="ruleForm.fax" @input="checkNumber('fax')" :maxlength="4"
                            placeholder="(例) 03"></el-input>
                </el-form-item>
                <span class="re_contact_form_-">-</span>
                <el-form-item prop="fax2" class="phone_input_item">
                  <el-input type="tel" v-model="ruleForm.fax2" @input="checkNumber('fax2')" :maxlength="4"
                            placeholder="(例) 6402"></el-input>
                </el-form-item>
                <span class="re_contact_form_-">-</span>
                <el-form-item prop="fax3" class="phone_input_item">
                  <el-input type="tel" v-model="ruleForm.fax3" @input="checkNumber('fax3')" :maxlength="4"
                            placeholder="(例) 3341"></el-input>
                </el-form-item>
              </div>
            </el-form-item>
            <el-form-item label="メールアドレス" prop="email">
              <el-input data-aos="fade-right" :data-aos-duration="500" v-model="ruleForm.email"
                        placeholder="(例) reinfo@reinfo.info"></el-input>
            </el-form-item>
            <el-form-item label="お問い合わせ内容" prop="content">
              <el-input data-aos="fade-right" :data-aos-duration="500" type="textarea" v-model="ruleForm.content"
                        placeholder="お問い合わせ、ご相談内容などご自由に記入ください。" :rows="6"></el-input>
            </el-form-item>
            <el-form-item label-width="0px" prop="type" class="tc" data-aos="fade-right" :data-aos-duration="500">
              <div class="re_contact_form_agree_content_title">ご提供いただく個人情報の取り扱いについて
              </div>
              <el-collapse-transition data-aos="fade-right" :data-aos-duration="500">
                <div>
                  <div class="re_contact_form_agree_content">
                    <h5>＜個人情報の利用目的＞</h5>
                    <p>お問い合わせ・資料請求の内容を正確に把握し、対処するため。</p>
                    <br/>
                    <h5>＜個人情報の第三者提供について＞</h5>
                    <p>本人の同意がある場合又は法令に基づく場合を除き、取得した個人情報を第三者に提供することはありません。</p>
                    <br/>
                    <h5>＜委託＞</h5>
                    <p>
                      上記の利用目的の達成の範囲内で、個人情報の取扱いの全部または一部を委託することがあります。委託にあたっては、十分な個人情報の保護水準を満たしている者を選定し、委託を受けた者に対する必要、かつ適切な監督を行います。</p>
                    <br/>
                    <h5>＜開示対象個人情報の開示等および問い合わせ窓口について＞</h5>
                    <p>
                      当社では、当個人情報に関する開示等の求め(利用目的の通知、開示、訂正・追加又は削除、利用又は提供の停止)を受け付けます。その手続きについては、個人情報苦情及びご相談窓口へご連絡下さい。ただし、法令等に基づく場合は、開示等に応じられない場合がございます。あらかじめご了承ください。</p>
                    <br/>
                    <h5>＜個人情報を入力するにあたっての注意事項＞</h5>
                    <p>必須項目以外の情報の提供は任意です。ただし、当該情報が提供されない場合にはご質問に適切に対処できない場合がございます。</p>
                    <br/>
                    <h5>＜本人が容易に認識できない方法による個人情報の取得＞</h5>
                    <p>
                      本ホームページでは、お客様に最適なサービスを提供するためにクッキー(Cookie)を一部使用しています。このクッキー(Cookie)から個人情報を特定できるような情報を得ることはありません。</p>
                    <br/>
                    <h5>個人情報の取り扱いに関するお問い合わせ先</h5>
                    <p>REイニシアチブ株式会社</p>
                    <p>個人情報保護管理者 宛</p>
                    <p>Tel：{{ HomeInfo.Tel }}</p>
                  </div>
                </div>
              </el-collapse-transition>
            </el-form-item>
            <el-form-item label-width="0px" prop="type" class="tc is-required" data-aos="fade-right"
                          :data-aos-duration="500">
              <el-checkbox v-model="ruleForm.agree">
                個人情報の取り扱いについて同意します
              </el-checkbox>
            </el-form-item>
            <el-form-item label-width="0px" prop="type" class="tc" data-aos="fade-right" :data-aos-duration="500">
              <div class="tc">
                <input type="button" class="all-btn" @click="submitForm('ruleForm')" value=" 入力内容を確認する "/>
              </div>
            </el-form-item>
          </el-form>
        </div>
        <div v-show="step===1" class="re_contact_form_check_body">
          <table class="re_contact_form_check_table">
            <tbody>
            <tr data-aos="fade-right" :data-aos-duration="500">
              <td class="re_contact_form_check_title">お問い合わせ種類</td>
              <td class="re_contact_form_check_content">{{ radioList()[ruleForm.typeContact].called }}</td>
            </tr>
            <tr data-aos="fade-right" :data-aos-duration="500">
              <td class="re_contact_form_check_title">お名前</td>
              <td class="re_contact_form_check_content">{{ ruleForm.name }}</td>
            </tr>
            <tr data-aos="fade-right" :data-aos-duration="500">
              <td class="re_contact_form_check_title">お名前フリガナ</td>
              <td class="re_contact_form_check_content">{{ ruleForm.nameFurigana }}</td>
            </tr>
            <tr :data-aos-duration="500" data-aos="fade-right" v-if="ruleForm.companyName!=''">
              <td class="re_contact_form_check_title">会社名</td>
              <td class="re_contact_form_check_content">{{ ruleForm.companyName }}</td>
            </tr>
            <tr :data-aos-duration="500" data-aos="fade-right" v-if="ruleForm.departmentName!=''">
              <td class="re_contact_form_check_title">部署</td>
              <td class="re_contact_form_check_content">{{ ruleForm.departmentName }}</td>
            </tr>
            <tr :data-aos-duration="500" data-aos="fade-right" v-if="ruleForm.positionName!=''">
              <td class="re_contact_form_check_title">役職</td>
              <td class="re_contact_form_check_content">{{ ruleForm.positionName }}</td>
            </tr>
            <tr :data-aos-duration="500" data-aos="fade-right" v-if="ruleForm.address!=''">
              <td class="re_contact_form_check_title">住所（都道府県）</td>
              <td class="re_contact_form_check_content">{{ ruleForm.address }}</td>
            </tr>
            <tr data-aos="fade-right" :data-aos-duration="500">
              <td class="re_contact_form_check_title">電話番号</td>
              <td class="re_contact_form_check_content">
                {{ ruleForm.phone + '-' + ruleForm.phone2 + '-' + ruleForm.phone3 }}
              </td>
            </tr>
            <tr data-aos="fade-right" :data-aos-duration="500" v-if="ruleForm.fax!=''">
              <td class="re_contact_form_check_title">FAX</td>
              <td class="re_contact_form_check_content">
                {{ ruleForm.fax + '-' + ruleForm.fax2 + '-' + ruleForm.fax3 }}
              </td>
            </tr>
            <tr data-aos="fade-right" :data-aos-duration="500">
              <td class="re_contact_form_check_title">メールアドレス</td>
              <td class="re_contact_form_check_content">{{ ruleForm.email }}</td>
            </tr>
            <tr data-aos="fade-right" :data-aos-duration="500">
              <td class="re_contact_form_check_title">お問い合わせ内容</td>
              <td class="re_contact_form_check_content type_content">{{ ruleForm.content }}</td>
            </tr>
            </tbody>
          </table>
          <div class="tc" data-aos="fade-right" :data-aos-duration="500">
            <input type="button" class="all-btn" @click="sendMail()" :loading="sending" value="送信"/>
            <input type="button" class="reinfo_back" @click="backform()" value="前画面へ戻る"/>
          </div>
        </div>
        <div v-show="step===2" class="re_contact_form_send_ok_body tc">
          <i class="el-icon-success re_contact_form_send_ok_ico"></i>
          <br/>
          <p class="f18" data-aos="fade-right" :data-aos-duration="500">お問い合わせありがとうございました。<br/>送信は正常に完了しました。</p>
          <div class="tc mt30" data-aos="fade-right" :data-aos-duration="500">
            <input type="button" class="all-btn" @click="backtop()" value=" トップページへ戻る "/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {useStore} from "vuex";

const typelist = [{called: '蓄電池システム'}, {called: '風車'}, {called: '太陽光発電'}, {called: '代理店・取り扱い店について'}, {called: '工事業者について'}, {called: 'その他'}];
const options = {
  '41043': '北海道',
  '41045': '青森県',
  '41047': '岩手県',
  '41049': '宮城県',
  '41051': '秋田県',
  '41053': '山形県',
  '41055': '福島県',
  '41057': '茨城県',
  '41059': '栃木県',
  '41061': '群馬県',
  '41063': '埼玉県',
  '41065': '千葉県',
  '41067': '東京都',
  '41069': '神奈川県',
  '41071': '新潟県',
  '41073': '富山県',
  '41075': '石川県',
  '41077': '福井県',
  '41079': '山梨県',
  '41081': '長野県',
  '41083': '岐阜県',
  '41085': '静岡県',
  '41087': '愛知県',
  '41089': '三重県',
  '41091': '滋賀県',
  '41093': '京都府',
  '41095': '大阪府',
  '41097': '兵庫県',
  '41099': '奈良県',
  '41101': '和歌山県',
  '41103': '鳥取県',
  '41105': '島根県',
  '41107': '岡山県',
  '41109': '広島県',
  '41111': '山口県',
  '41113': '徳島県',
  '41115': '香川県',
  '41117': '愛媛県',
  '41119': '高知県',
  '41121': '福岡県',
  '41123': '佐賀県',
  '41125': '長崎県',
  '41127': '熊本県',
  '41129': '大分県',
  '41131': '宮崎県',
  '41133': '鹿児島県',
  '41135': '沖縄県',
  '41137': '海外'
}

export default {
  name: "MailFrom",
  data() {
    return {
      step: 0,
      agree: false,
      options,
      ww: window.innerWidth,
      ruleForm: {
        typeContact: 0,
        name: '',
        nameFurigana: '',
        companyName: '',
        departmentName: '',
        positionName: '',
        address: '',
        phone: '',
        phone2: '',
        phone3: '',
        fax: '',
        fax2: '',
        fax3: '',
        email: '',
        content: '',
        agree: false
      },
      sending: false,
      rules: {
        name: [
          {
            required: true,
            message: 'お名前を入力してください',
            trigger: 'blur'
          }
        ],
        nameFurigana: [
          {
            pattern: /^[ァ-ー\s]+$/u,
            required: true,
            message: 'フリガナを入力してください',
            trigger: 'blur'
          }
        ],
        phone: [
          {
            pattern: /^[0-9]{2,4}$/g,
            required: true,
            message: '番号を入力してください',
            trigger: 'change'
          }
        ],
        phone2: [
          {
            pattern: /^[0-9]{2,4}$/g,
            required: true,
            message: '番号を入力してください',
            trigger: 'change'
          }
        ],
        phone3: [
          {
            pattern: /^[0-9]{4}$/g,
            required: true,
            message: '番号を入力してください',
            trigger: 'change'
          }
        ],
        fax: [
          {
            pattern: /^[0-9]{2,4}$/g,
            required: false,
            message: '番号を入力してください',
            trigger: 'change'
          }
        ],
        fax2: [
          {
            pattern: /^[0-9]{2,4}$/g,
            required: false,
            message: '番号を入力してください',
            trigger: 'change'
          }
        ],
        fax3: [
          {
            pattern: /^[0-9]{4}$/g,
            required: false,
            message: '番号を入力してください',
            trigger: 'change'
          }
        ],
        email: [
          {
            type: 'email',
            required: true,
            message: 'メールアドレスを正しく入力してください',
            trigger: 'blur'
          }
        ],
        content: [
          {
            required: true,
            message: 'お問い合わせを正しく入力してください',
            trigger: 'blur'
          }
        ]
      }
    }
  },
  mounted() {
  },
  methods: {
    radioList() {
      return typelist;
    },
    checkNumber(name) {
      let text = this.ruleForm[name]
      this.ruleForm[name] = text.replace(/[^\d]/g, '')
    },
    backtop() {
      window.location.href = '/'
    },
    send() {
      this.step = 2
      document.body.scrollTop = document.documentElement.scrollTop = 0
    },
    backform() {
      this.step = 0
      document.body.scrollTop = document.documentElement.scrollTop = 0
    },
    submitForm(formName) {
      this.$refs[formName].validate(valid => {
        if (valid) {
          if (!this.ruleForm.agree) {
            this.$message({
              message:
                  '「個人情報の取り扱いについて同意します」をチェックしてください。',
              type: 'warning'
            })
            return false
          }
          this.step = 1
          document.body.scrollTop = document.documentElement.scrollTop = 0
        } else {
          return false
        }
      })
    },
    resetForm(formName) {
      this.$refs[formName].resetFields()
    },
    sendMail() {
      let params = {
        name: this.ruleForm.name,
        nameFurigana: this.ruleForm.nameFurigana,
        companyName: this.ruleForm.companyName,
        departmentName: this.ruleForm.departmentName,
        positionName: this.ruleForm.positionName,
        address: this.ruleForm.address,
        phone: this.ruleForm.phone + this.ruleForm.phone2 + this.ruleForm.phone3,
        fax: this.ruleForm.fax + this.ruleForm.fax2 + this.ruleForm.fax3,
        email: this.ruleForm.email,
        content: this.ruleForm.content,
        typeContact: typelist[this.ruleForm.typeContact].called
      }
      this.sending = true,
          $.ajax({
            type: "POST",
            url: "/api/mail.php",
            dataType: "json",
            data: params,
            success: (res) => {
              this.sending = false
              if (!res) {
                this.$message({
                  message:
                      'ただいまメンテナンス中です。ご迷惑をお掛け致しますが、しばらくお待ち下さい。。',
                  type: 'warning'
                })
                return false
              }
              if (res.code === 1) {
                this.send()
              } else {
                this.$message({
                  message:
                      'ただいまメンテナンス中です。ご迷惑をお掛け致しますが、しばらくお待ち下さい。。',
                  type: 'warning'
                })
              }
            },
          });
    }
  },
  setup() {
    const store = useStore()
    const HomeInfo = store.state.HomeInfo

    return {HomeInfo}
  }
}
</script>
