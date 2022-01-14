import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'
import Service from "@/views/Service";
import About from "@/views/About";
import Access from "@/views/Access";
import Contact from "@/views/Contact";
import ServiceMain from "@/components/ServiceMain";
import Wind from "@/components/Wind";
import Battery from "@/components/Battery";
import Solar from "@/components/Solar";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: {
            pathType: 'home',
            title: 'ホーム',
            content: {
                keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,FIT価格は年々下がり続ける中、FIPが始まり、再生可能エネルギー,RE INITIATIVE-ホーム,REイニシアチブ株式会社,REイニシアチブ - ホーム,,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム,03-6402-3341,0364023341,東京都港区浜松町2-5-3,風力発電、太陽光発電を通じ地球環境に貢献する会社です',
                description: 'REイニシアチブ株式会社は蓄電システム、風力発電、太陽光発電を通じ地球環境に貢献する会社です。'
            }
        }
    },
    {
        path: '/about',
        name: 'About',
        component: About,
        meta: {
            pathType: 'about',
            title: '会社概要',
            content: {
                keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,RE INITIATIVE-会社概要,REイニシアチブ株式会社,REイニシアチブ - 会社概要,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム,「REI- AI storage battery System」は、REイニシアチブのオリジナルブランドです,FIT価格は年々下がり続ける中、FIPが始まり、再生可能エネルギー',
                description: '2050年カーボンニュートラルZERO目標の達成に向けて、' +
                    '電力価格の上昇が見込まれます。' +
                    'FIT価格は年々下がり続ける中、FIPが始まり、' +
                    '蓄電の重要性が高まっています。' +
                    '再生可能エネルギーを有効に活用するために、' +
                    'REイニシアチブの蓄電システムをご提案します'
            }
        }
    },
    {
        path: '/service',
        name: 'Service',
        component: Service,
        meta: {
            pathType: 'service',
            title: '事業内容',
            content: {
                keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,RE INITIATIVE-事業内容,REイニシアチブ株式会社,REイニシアチブ - 事業内容,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム',
                description: '太陽光発電, 風力発電, 蓄電システム'
            }
        },
        children: [{
            path: '/service',
            name: 'ServiceMain',
            component: ServiceMain,
            meta: {
                pathType: 'serviceMain',
                title: '事業内容',
                content: {
                    keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,Service,RE INITIATIVE-事業内容,REイニシアチブ株式会社,REイニシアチブ - 事業内容,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム',
                    description: '太陽光発電, 風力発電, 蓄電システム'
                }
            }
        },
            {
                path: '/service/solar',
                name: 'Solar',
                component: Solar,
                meta: {
                    pathType: 'solar',
                    title: '太陽光発電',
                    content: {
                        keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,Solar,RE INITIATIVE-太陽光発電,REイニシアチブ株式会社,REイニシアチブ - 太陽光発電,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム',
                        description: '太陽光発電, 風力発電, 蓄電システム'
                    }
                }
            },
            {
                path: '/service/battery',
                name: 'Battery',
                component: Battery,
                meta: {
                    pathType: 'battery',
                    title: '蓄電システム',
                    content: {
                        keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,Battery,RE INITIATIVE-蓄電システム,REイニシアチブ株式会社,REイニシアチブ - 蓄電システム,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム',
                        description: '太陽光発電, 風力発電, 蓄電システム'
                    }
                }
            },
            {
                path: '/service/wind',
                name: 'Wind',
                component: Wind,
                meta: {
                    pathType: 'wind',
                    title: '風力発電',
                    content: {
                        keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,Wind,RE INITIATIVE-風力発電,REイニシアチブ株式会社,REイニシアチブ - 風力発電,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム',
                        description: '太陽光発電, 風力発電, 蓄電システム'
                    }
                }
            },
        ]
    },
    {
        path: '/access',
        name: 'Access',
        component: Access,
        meta: {
            pathType: 'access',
            title: 'アクセス',
            content: {
                keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,〒105-0013,105-0013,1050013,Wind,RE INITIATIVE-アクセス,REイニシアチブ株式会社,REイニシアチブ - アクセス,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム,東京都港区浜松町2-5-3',
                description: '〒105-0013 東京都港区浜松町2-5-3'
            }
        }
    },
    {
        path: '/contact',
        name: 'Contact',
        component: Contact,
        meta: {
            pathType: 'contact',
            title: 'お問い合わせ',
            content: {
                keywords: '再生可能エネルギ,自由な発想で新製品を開発,,長年の研究技術,カーボンニュートラルZERO目標,新しいビジネススタイルをご提案,ビジネススタイル提案,提案,FIT,当社蓄電池は、AIシステムを導入,RE INITIATIVE-ホーム,REイニシアチブ株式会社,REイニシアチブ - ホーム,,REイニシアチブ,太陽光発電, 風力発電, 蓄電システム,お問い合わせ,商品カタログ、注文に関する質問などご遠慮なく連絡してください',
                description: '商品カタログ、注文に関する質問などご遠慮なく連絡してください'
            }
        }
    },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
