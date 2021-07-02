<template>
    <div class="wrapper">
        <RegistrationSteps v-if="step > 1" :step="step" />

        <RegistrationStepPlans v-if="step === 1" :planActive="planActive" :plans="plans" :questions="questions" v-model="account.plan" @input="toAccountData"/>
        <RegistrationStepClient v-else-if="step === 2" v-model="account" :account="account" :plan="plans[account.plan]" @backToPlans="choosePlan" @toPropertyData="toPropertyData" @validate="validate" @dataProceed="dataProceed" />
        <RegistrationStepProperty v-else-if="step === 3" v-model="account" :account="account" :plan="plans[account.plan]" @backToPlans="choosePlan" @toSummaryData="toSummaryData" @validate="validate" @dataProceed="dataProceed" />
        <RegistrationStepSummary v-else-if="step === 4" v-model="account" :account="account" :plan="plans[account.plan]" @backToPlans="choosePlan" @toPropertyData="toPropertyData" @toAccountData="toAccountData" @dataProceed="dataProceed"/>
    </div>
</template>

<script>
import RegistrationStepSummary from "./registration/RegistrationStepSummary";
require('../../bootstrap');

import RegistrationStepProperty from "./registration/RegistrationStepProperty";
import RegistrationSteps from "./registration/partials/RegistrationSteps";
import RegistrationStepPlans from "./registration/RegistrationStepPlans";
import RegistrationStepClient from "./registration/RegistrationStepClient";

export default {
    name: "Registration",
    components: {
        RegistrationStepSummary,
        RegistrationStepProperty, RegistrationSteps, RegistrationStepClient, RegistrationStepPlans},
    data() {
        return {
            step: 1,
            planActive: 'popular',
            plans: {
                base: {
                    title: this.$t('Base'),
                    price: 0,
                    annual: 468,
                    description: this.$t('Our permanently free version'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: false },
                        { text: this.$t('Optimization'), active: false },
                        { text: this.$t('Phone support'), adtive: false },
                        { text: this.$t('Special application'), active: false }
                    ]
                },
                intro: {
                    title: this.$t('Intro'),
                    price: 10,
                    annual: 468,
                    description: this.$t('Perfect for beginners with multiple objects'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: true },
                        { text: this.$t('Optimization'), active: true },
                        { text: this.$t('Phone support'), active: true },
                        { text: this.$t('Special application'), active: false }
                    ]
                },
                popular: {
                    title: this.$t('Popular'),
                    price: 20,
                    annual: 468,
                    description: this.$t('Our recommendation for maximum profit'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: true },
                        { text: this.$t('Optimization'), active: true },
                        { text: this.$t('Phone support'), active: true },
                        { text: this.$t('Special application'), active: true }
                    ]
                },
                enterprise: {
                    title: this.$t('Enterprise'),
                    price: 50,
                    annual: 468,
                    description: this.$t('The luxury version with its own page'),
                    options: [
                        { text: this.$t('Own analytics platform'), active: true },
                        { text: this.$t('Chat support'), active: true },
                        { text: this.$t('Unlimited options'), active: true },
                        { text: this.$t('Optimization'), active: true },
                        { text: this.$t('Phone support'), active: true },
                        { text: this.$t('Special application'), active: true },
                        { text: this.$t('own sub-domain (only business plan)'), active: true }
                    ]
                }
            },
            questions: [
                {
                    text: 'Wie vermiete ich meine Monteurunterfünfte über CHECK-ZIMMER.de? ',
                    reply: '<p>Klicken Sie einfach auf Unterkunft vermieten und wählen Sie einen Tarif. Es gibt einen kostenfreien und drei kostenpflichtige Tarife, die Ihnen unterschiedliche Funktionen ermöglichen. Anschließend geben Sie ihre Kontaktinformationen an und füllen die Informationen zu Ihren Objekten aus. Sie können auch mehrere Monteurzimmer in eine Anzeige zusammenfassen, fügen Sie hierfür einfach alle vorhandenen Immobilien hinzu.</p> \n' +
                        '\n' +
                        '<p>Benötigen Sie Unterstützung sind wir rund um die Uhr telefonisch für Sie erreichbar. Alternativ können Sie uns eine E-Mail schreiben oder über das Kontaktformular kontaktieren.</p> \n'
                },
                {
                    text: 'Welche Größe sollte ein Monteurzimmer haben? ',
                    reply: '<p>Für die Vermietung von Wohnungen und Zimmer gibt es exakte Vorschriften des Gesetzgebers. Ein Einzelzimmer muss laut Gesetz mindestens 8qm groß sein. Doppel- bzw. Zweibettzimmer müssen eine verpflichtende Grüße von mindestens 12qm aufweisen. Das Badezimmer ist hierbei nicht mit eingeschlossen, sondern kommt noch separat hinzu.</p>\n' +
                        '\n' +
                        '<p>Wenn Sie sich nicht sicher sind, ob ihre Immobilie für eine Vermietung geeignet ist, können Sie dies bei der verantwortlichen Behörde erfragen. In manchen Fällen werden Ausnahmegenehmigungen ausgestellt und Sie sind rechtlich abgesichert. Neben der Größe des Monteurzimmers gibt es auch lokale Brandschutzvorschriften. Setzen Sie sich in jedem Fall vor einer Vermietung gründlich mit dem Thema auseinander. Zögern Sie bei Fragen nicht unsere Service-Mitarbeiter zu kontaktieren. Telefonisch sind wir rund um die Uhr für Sie erreichbar, aber auch per E-Mail oder Kontaktformular bekommen Sie jederzeit Auskunft.</p>'
                },
                {
                    text: 'Welche Ausstattung sollte in einem Zimmer für Monteure vorhanden sein??',
                    reply: '<p>Die Grundausstattung für ein Monteurzimmer enthält folgende Gegenstände:</p> \n' +
                    '\n' +
                        '<p>Schlafbereich:</p> \n' +
                        '\n' +
                        '<p>- Sitzgelegenheiten für alle Mieter</p> \n' +
                        '\n' +
                        '<p>- Ausreichend Einzelbettenr</p> \n' +
                        '\n' +
                        '<p>- Kleiderschränke bzw. -stangen</p> \n' +
                        '\n' +
                        '<p>Die Ausstattung muss nicht neu sein, sollte aber gepflegt und in einem guten Zustand sein. Sind Möbel beschädigt oder reparaturbedürftig, sollten die Mängel schnellstens beseitigt werden, da sie ein Gesundheitsrisiko für die Monteure darstellen können und zu Beschwerden führen.  Alles was über die Grundausstattung hinaus geht, können Sie als Bonus für ihre Monteurunterkunft auszeichnen – das bringt den Mietern ein höheres Level an Komfort und Ihnen mehr Buchungen.</p> \n' +
                        '\n' +
                        '<p>Da Monteure zum Teil sehr lange Arbeitszeiten haben, ist es für sie nicht immer möglich sich auswärts zu verpflegen. Eine kleine Küchenzeile wäre somit definitiv eine sinnvolle Anschaffung für Ihr Monteurzimmer. Ob jede Wohneinheit eine eigene Küche bekommt oder sie eine größere Gemeinschaftsküche zur Verfügung stellen, obliegt Ihrer Entscheidung und den gegebenen Möglichkeiten. Falls Sie sich dazu entscheiden, eine Küche zur Verfügung zu stellen, sollte diese folgende Gegenstände beinhalten:</p> \n' +
                        '\n' +
                        '<p>Essbereich:</p> \n' +
                        '\n' +
                        '<p>- Esstisch(e)</p> \n' +
                        '\n' +
                        '<p>- Kühlschrank</p> \n' +
                        '\n' +
                        '<p>- Herd</p> \n' +
                        '\n' +
                        '<p>- Spüle</p> \n' +
                        '\n' +
                        '<p>- Wasserkocher</p> \n' +
                        '\n' +
                        '<p>- Kochutensilien</p> \n' +
                        '\n' +
                        '<p>- Geschirr und Besteck</p> \n' +
                        '\n' +
                        '<p>Besonders angenehm wird es für ihre Gäste sein, wenn die Monteurunterkunft mit kleinen Annehmlichkeiten, wie Spülmittel, Hand bzw. Küchentücher, Putzutensilien, und ggf. eine Grundausstattung an Gewürzen, ausgestattet ist. Auf jeden Fall sollten Sie klare Sauberkeitsregeln festlegen, sodass Sie ihr Monteurzimmer, so vorfinden, wie Sie es sich von Ihren Mietern wünschen.</p> \n' +
                        '\n' +
                        '<p>- Die wohl wichtigste Frage für Monteure betrifft die sanitären Anlagen. Ob eigenes Badezimmer oder Gemeinschaftsbad spielt keine allzu große Rolle, solange es sauber und groß genug ist, um Wartezeiten zu minimieren. Gemeinschaftsbäder sollten außerdem täglich gereinigt werden.</p> \n' +
                        '\n' +
                        '<p>Folgendes darf im Badezimmer einer Monteurunterkunft nicht fehlen:</p> \n' +
                        '\n' +
                        '<p>- Waschbecken</p> \n' +
                        '\n' +
                        '<p>- Toilette sowie Toilettenpapier und eine Klobürste</p> \n' +
                        '\n' +
                        '<p>- Badewanne oder Dusche</p> \n' +
                        '\n' +
                        '<p>- Ein Schrank oder eine Ablage für Utensilien</p> \n' +
                        '\n' +
                        '<p>- Seife</p> \n' +
                        '\n' +
                        '<p>- Handtuchhalter</p> \n' +
                        '\n' +
                        '<p>- Spiegel</p> \n' +
                        '\n' +
                        '<p>Extras, wie Haartrockner, Shampoo, Duschgel oder Handtücher werden bei den Monteuren einen guten Eindruck hinterlassen und dazu führen, dass Sie bei erneutem Bedarf die erste Anlaufstelle sein werden. Denken Sie in jedem Fall an eine Hausordnung, sodass alle Beteiligten wissen, welche Regeln das Mieten Ihres Monteurzimmers beinhaltet und welches Verhalten Sie sich von den Gästen wünschen.</p> \n'
                },
                {
                    text: 'Kann eine Ferienwohnung als Monteurunterkunft vermietet werden?',
                    reply: '<p>Wenn Sie eine bereits zur Vermietung genehmigte Ferienwohnung oder ein Ferienhaus besitzen können Sie dies ganz einfach auch an Monteure vermieten. Handwerker und Bauarbeiter haben keine besonderen Ansprüche, die durch eine reguläre Ferienwohnung nicht abgedeckt wären. Außerdem bestehen keine besonderen rechtlichen Ansprüche an eine Monteurwohnung im Gegensatz zu einer Ferienwohnung.</p>'
                },
                {
                    text: 'Fallen für die Vermietung von Monteurzimmern Steuern an?',
                    reply: '<p>Grundsätzlich ist die Vermietung von Monteurzimmern umsatzsteuerpflichtig. Dass die Ausnahmen die Regeln bestätigen, ist aber auch hier der Fall. Je nach Jahreseinkommen der Vermieter kann es zu einer Befreiung von der Umsatzsteuer kommen.</p> \n' +
                        '\n' +
                        '<p>Zunächst aber gilt es die Steuerfreigrenzen zu beachten: bei vorrübergehender Vermietung eines Monteurzimmers liegt dieser bei 520 Euro und bei dauerhafter Vermietung der Unterkunft liegt er bei 410 Euro. Werden diese Beträge überschritten, so fallen Steuern an.</p> \n' +
                        '\n' +
                        '<p>Dank der Kleinunternehmerregelung kann die Umsatzsteuer, wenn man es möchte, entfallen, sofern der Jahresumsatz im Vorjahr 22.000 Euro und im laufenden Jahr 50.000 Euro nicht überschreitet. Ob Sie von der Kleinunternehmerregelung gebrauch machen können oder sollten, ist eine Einzelfallentscheidung. Denn auch der Verzicht auf diese Regelung bringt Vorteile mit sich. So können Sie für die Vermietung eines Monteurzimmers diverse Kosten, wie Anschaffungskosten, Versicherungen, Büroutensilien, Fahrtkosten, die das Mietobjekt betreffen und vieles mehr von der Steuer absetzen.</p> \n'
                }
            ],
            account: {
                validate: false,
                plan: 'intro',
                billing: {
                    type: 'company',
                    company: '',
                    stid: '',
                    person: {
                        addr: this.$t('Mister'),
                        first_name: '',
                        last_name: '',
                    },
                    address: {
                        street: '',
                        house: '',
                        postcode: '',
                        country: this.$t('Germany'),
                        city: 'Leipzig'
                    },
                    match_address: true,
                    match_person: false
                },
                post: {
                    person: {
                        addr: this.$t('Mister'),
                        first_name: '',
                        last_name: '',
                    },
                    address: {
                        street: '',
                        house: '',
                        postcode: '',
                        country: this.$t('Germany'),
                        city: 'Leipzig'
                    },
                },
                contact: {
                    person: {
                        name: '',
                        addr: '',
                    },
                    email: '',
                    email_display: true,

                    phone: '',
                    phone_display: true,
                    phone_whatsapp: false,
                    phone_fax: '',
                    phone_fax_enable: '',
                    phoneAdditional: '',
                    phoneAdditional_display: false,
                    phoneAdditional_whatsapp: false,
                    phoneStat: '',
                    phoneStat_display: false,
                    website: '',
                    website_enable: false
                },
                languages: {
                    german: true,
                    english: false,
                    poland: false,
                    russian: false
                },
                property: {
                    contact: {
                        person: {
                            name: '',
                            addr: '',
                        },
                        email: '',
                        email_display: true,
                        phone: '',
                        phone_display: true,
                        phone_whatsapp: false,
                        phoneAdditional: '',
                        phoneAdditional_display: false,
                        phoneAdditional_whatsapp: false,
                        phoneStat: '',
                        phoneStat_display: false,
                        phone_fax: '',
                        phone_fax_enable: '',
                        website: '',
                        website_enable: false,
                        form_display: true
                    },
                    propertyTypes: [
                        {
                            name: 'Wohnung',
                            num: 9,
                            persons: 18,
                            price: 10,
                            rooms: [
                                {
                                    name: 'одноместный',
                                    num: 2,
                                    persons: 1,
                                    price: 10
                                },
                                {
                                    name: 'двухместный',
                                    num: 5,
                                    persons: 2,
                                    price: 12
                                },
                                {
                                    name: 'трехместный',
                                    num: 2,
                                    persons: 3,
                                    price: 15
                                },
                            ]
                        },
                        {
                            name: 'Pension',
                            num: 2,
                            persons: 6,
                            price: 17,
                            rooms: [
                                {
                                    name: 'трехместный',
                                    num: 2,
                                    persons: 3,
                                    price: 17
                                }
                            ]
                        }
                    ],
                    facilities: [],
                    media: {
                        photos: [
                            '/img/background.png',
                            '/img/background.png',
                            '/img/background.png',
                        ],
                        video: '',
                        facebook: ''
                    }
                }
            }
        }
    },
    mounted() {
        let acc = JSON.parse(localStorage.getItem('application-data'))
        if (acc) {
            this.account = acc;
        }

    },
    methods: {
        choosePlan() {
            this.step = 1;
        },
        toAccountData() {
            this.step = 2;
        },
        toPropertyData() {
            this.step = 3;
        },
        toSummaryData() {
            this.step = 4;
        },
        validate(value) {
            this.account.validate = value;
        },
        dataProceed() {
            localStorage.setItem('application-data', JSON.stringify(this.account));
        }
    }
}
</script>

<style scoped>

</style>
