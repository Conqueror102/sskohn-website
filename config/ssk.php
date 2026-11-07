<?php

/*
|--------------------------------------------------------------------------
| Streamsowers & Köhn — site content
|--------------------------------------------------------------------------
| Copy is taken from sskohn.com (Nov 2026). Figures shown on the site are
| only ones the firm publishes itself; nothing here is invented.
*/

return [

    'name' => 'Streamsowers & Köhn',
    'short' => 'SSKÖHN',
    'email' => 'info@sskohn.com',
    'phones' => ['+234 (0)201 291 0589', '+234 915 119 4092'],
    'source' => 'https://sskohn.com',

    // Serverless hosting: build a throwaway SQLite database in /tmp on cold start (see AppServiceProvider).
    'ephemeral_sqlite' => (bool) env('EPHEMERAL_SQLITE', false),

    'social' => [
        'LinkedIn' => 'https://www.linkedin.com/company/sskohnng/',
        'Instagram' => 'https://www.instagram.com/sskohnng/',
    ],

    'offices' => [
        ['city' => 'Lagos', 'tag' => 'Head office', 'address' => '852b Bishop Aboyade Cole St, Victoria Island, Lagos'],
        ['city' => 'Abuja', 'tag' => 'Wuse II', 'address' => 'Block C Terrace 3, CT3, Lobito Crescent, Stallion Estate, Wuse II, Abuja'],
        ['city' => 'Port Harcourt', 'tag' => 'GRA Phase II', 'address' => '77B Woji Road, GRA Phase II, Port Harcourt'],
    ],

    // Their homepage slider, reused as the manifesto.
    'promises' => [
        'We are by your side, navigating through and around risks.',
        'We give balanced counsel amidst competing interests.',
        'We align with the trajectory of your ambition.',
        'Our experience resounds with outstanding success.',
        'We are renowned for simplifying complex legal problems.',
    ],

    'figures' => [
        ['value' => 3, 'suffix' => '', 'label' => 'Senior Advocates of Nigeria among our partners'],
        ['value' => 5, 'suffix' => '', 'label' => 'Fellows of the Chartered Institute of Arbitrators (UK)'],
        ['value' => 30, 'suffix' => ' yrs', 'label' => 'Of upstream oil & gas acquisitions and divestments'],
        ['value' => 100, 'suffix' => '%', 'label' => 'Of the mergers we notified, cleared by the FCCPC'],
    ],

    'practices' => [
        [
            'slug' => 'aviation',
            'title' => 'Aviation',
            'full' => 'Aviation Group',
            'image' => 'aviation',
            'icon' => 'airplane-tilt',
            'summary' => 'Our team has been involved in developing the legislative framework for the Nigerian aviation sector for the past two decades — from setting up operations in Nigeria to aircraft financing, regulatory interface and liability.',
            'matter' => 'Secured the release of an arrested aircraft on US$100,000 security, against a claim in excess of US$1.5m.',
            'url' => 'https://sskohn.com/practice-areas/aviation-group/',
        ],
        [
            'slug' => 'corporate',
            'title' => 'Corporate & Commercial',
            'full' => 'Corporate and Commercial Group',
            'image' => 'corporate',
            'icon' => 'briefcase',
            'summary' => 'At the centre of the Firm’s practice: M&A, project finance, private equity, capital markets, restructuring, banking, telecoms, IP, real estate, tax, trusts and estate planning — attuned to foreign investors and startups.',
            'matter' => 'Advised an African telecoms infrastructure company on tower supply agreements valued at ₦1.6 billion.',
            'url' => 'https://sskohn.com/practice-areas/corporate-and-commercial-group-2/',
        ],
        [
            'slug' => 'disputes',
            'title' => 'Dispute Resolution',
            'full' => 'Dispute Resolution Group',
            'image' => 'courtroom',
            'icon' => 'gavel',
            'summary' => 'Litigators and arbitrators overseen by a Senior Advocate of Nigeria, appearing at every level of the superior courts and in local and international arbitrations.',
            'matter' => 'Acted in the suit that set aside a multibillion-dollar arbitral award, on the novel argument that Petroleum Profits Tax disputes are not arbitrable in Nigeria.',
            'url' => 'https://sskohn.com/practice-areas/dispute-resolution-group-2/',
        ],
        [
            'slug' => 'energy',
            'title' => 'Energy & Natural Resources',
            'full' => 'Energy, Natural Resources and Environmental Law Group',
            'image' => 'energy',
            'icon' => 'drop',
            'summary' => 'Acting for leading multinational and local players across power, water, mining and oil and gas — production sharing contracts, JOAs, permits, leases, local content and host-community issues.',
            'matter' => 'Nigerian counsel to an international oil company on its listing on the Toronto Stock Exchange and its subsequent acquisition.',
            'url' => 'https://sskohn.com/practice-areas/energy-natural-resources-and-environmental-law-group-2/',
        ],
        [
            'slug' => 'legislative',
            'title' => 'Legislative Oversight',
            'full' => 'Legislative Oversight and Governmental Activities Group',
            'image' => 'legislative',
            'icon' => 'bank',
            'summary' => 'LORGAP monitors and analyses legislative activity at the National Assembly and State Assemblies, and appears before investigating committees, public hearings and the courts on the scope of legislative power.',
            'matter' => 'Acted for ALTON in challenging the National Assembly’s power to summon and investigate telecommunications operators.',
            'url' => 'https://sskohn.com/practice-areas/legislative-oversight-and-governmental-activities-group-2/',
        ],
        [
            'slug' => 'competition',
            'title' => 'Competition Law',
            'full' => 'Competition Law',
            'image' => 'competition',
            'icon' => 'scales',
            'summary' => 'Advising across industries since the FCCPA came into force — restrictive agreements, abuse of dominance and merger notifications before the FCCPC and sector regulators.',
            'matter' => 'Notified the FCCPC of Seplat Petroleum’s acquisition of 100% of Eland Oil and Gas Plc. Cleared.',
            'url' => 'https://sskohn.com/practice-areas/competition-law/',
        ],
    ],

    // Representative matters, as published on the firm's practice pages.
    'matters' => [
        ['figure' => 'US$6m', 'title' => 'Export credit facility from US EXIM Bank for an airline operator’s acquisition of new aircraft.', 'group' => 'Aviation', 'url' => 'https://sskohn.com/practice-areas/aviation-group/', 'image' => 'aviation'],
        ['figure' => '35.43%', 'title' => 'Merger notification for SALIC’s indirect stake in Olam Agri Holdings, a Public Investment Fund of Saudi Arabia subsidiary.', 'group' => 'Competition', 'url' => 'https://sskohn.com/practice-areas/competition-law/', 'image' => 'competition'],
        ['figure' => '812 ha', 'title' => 'Acting for a smart-city investor against the FCT Minister and FCDA over a change in land use.', 'group' => 'Disputes', 'url' => 'https://sskohn.com/practice-areas/dispute-resolution-group-2/', 'image' => 'courtroom'],
        ['figure' => '₦1.6bn', 'title' => 'Supply and delivery agreements for quick-site towers with a leading mobile network operator.', 'group' => 'Corporate', 'url' => 'https://sskohn.com/practice-areas/corporate-and-commercial-group-2/', 'image' => 'corporate'],
        ['figure' => 'MC99', 'title' => 'Successfully defended a major American airline against passenger claims under the Montreal Convention 1999.', 'group' => 'Aviation', 'url' => 'https://sskohn.com/practice-areas/aviation-group/', 'image' => 'aviation'],
        ['figure' => 'LCIA', 'title' => 'London arbitration over shareholding and funding in the acquisition of an electricity distribution company.', 'group' => 'Disputes', 'url' => 'https://sskohn.com/practice-areas/dispute-resolution-group-2/', 'image' => 'energy'],
    ],

    'values' => [
        ['name' => 'Confidentiality', 'text' => 'Client information we receive or derive is retained to the highest degree of the confidential character of the lawyer–client relationship.'],
        ['name' => 'Diversity', 'text' => 'We recognise and celebrate individual strengths regardless of gender, ethnicity or religion — and mentor our team to succeed at the highest level.'],
        ['name' => 'Empathy', 'text' => 'People are affected by how legal matters are handled. We take an intentional, thoughtful approach to the feelings and experiences of our clients.'],
        ['name' => 'Fidelity', 'text' => 'Loyal to the law, our clients and our team in every situation — as good as our word, always acting in our clients’ best interest.'],
        ['name' => 'Integrity', 'text' => 'High standards of personal and professional accountability. Unfailing conformance to moral and ethical principle preserves the integrity of our practice.'],
        ['name' => 'Professionalism', 'text' => 'First-class, value-added assistance combined with an in-depth understanding of our clients’ affairs. The goal: exceed expectations, every time.'],
    ],

    'partners' => [
        ['name' => 'Etigwe Uwa', 'post' => 'SAN', 'role' => 'Partner, Dispute Resolution', 'photo' => 'Etigwe-Uwa-SAN', 'slug' => 'etigwe-uwa'],
        ['name' => 'Chiagozie Hilary-Nwokonko', 'post' => null, 'role' => 'Partner', 'photo' => 'Chiagozie-Hilary-Nwokonko', 'slug' => 'chiagozie-hilary-nwokonko'],
        ['name' => 'Tamuno Atekebo', 'post' => null, 'role' => 'Partner', 'photo' => 'Tamuno-Atekebo', 'slug' => 'tamuno-atekebo'],
        ['name' => 'Adeyinka Aderemi', 'post' => 'SAN', 'role' => 'Partner, Dispute Resolution', 'photo' => 'Adeyinka-Aderemi-SAN', 'slug' => 'adeyinka-aderemi'],
        ['name' => 'Chinasa Unaegbunam', 'post' => 'SAN', 'role' => 'Partner', 'photo' => 'Chinasa-Unaegbunam-SAN', 'slug' => 'chinasa-unaegbunam'],
        ['name' => 'Otome Okolo', 'post' => null, 'role' => 'Partner', 'photo' => 'Otome-Okolo', 'slug' => 'otome-okolo'],
        ['name' => 'Chukwuyere Izuogu', 'post' => null, 'role' => 'Partner', 'photo' => 'Chukwuyere-Izuogu', 'slug' => 'chukwuyere-izuogu'],
        ['name' => 'Omono Blessing Omaghomi', 'post' => null, 'role' => 'Partner', 'photo' => 'Omono-Blessing-Omaghomi', 'slug' => 'blessing-omono-omaghomi'],
        ['name' => 'Vincent Owhor', 'post' => null, 'role' => 'Partner', 'photo' => 'Vincent-Owhor', 'slug' => 'vincent-owhor'],
    ],

    'recognitions' => [
        ['name' => 'Chambers Global', 'note' => 'Ranked firm'],
        ['name' => 'Chambers', 'note' => '2025'],
        ['name' => 'IFLR1000', 'note' => 'Recommended firm 2024'],
        ['name' => 'IR Global', 'note' => 'Member firm'],
    ],

    'insights' => [
        ['kind' => 'Article', 'group' => 'Disputes', 'title' => 'Beyond the Mere Witness: Compelling Third-Party Disclosure to Identify Wrongdoers in Nigeria', 'url' => 'https://sskohn.com/beyond-the-mere-witness-compelling-third-party-disclosure-to-identify-wrongdoers-in-nigeria/', 'image' => 'library'],
        ['kind' => 'Article', 'group' => 'Energy', 'title' => 'Legal Risks and Opportunities in Nigeria’s Lithium Economy: A Vital Mineral in Focus', 'url' => 'https://sskohn.com/legal-risks-and-opportunities-in-nigerias-lithium-economy-a-vital-mineral-in-focus/', 'image' => 'energy'],
        ['kind' => 'Op-Ed', 'group' => 'Competition', 'title' => 'Making Nigeria’s Cloud Market Contestable: Competition Policy Lessons from the UK Experience', 'url' => 'https://sskohn.com/making-nigerias-cloud-market-contestable-competition-policy-lessons-from-the-uk-experience/', 'image' => 'competition'],
        ['kind' => 'Article', 'group' => 'Disputes', 'title' => 'Interrogatories in Garnishee Proceedings under Nigerian Law', 'url' => 'https://sskohn.com/interrogatories-in-garnishee-proceedings-under-nigerian-law/', 'image' => 'courtroom'],
        ['kind' => 'Spotlight', 'group' => 'Legislative', 'title' => 'Legislative Spotlight: NOSDRA Establishment Act Amendment Bill 2025', 'url' => 'https://sskohn.com/legislative-spotlight-nosdra-establishment-act-amendment-bill-2025/', 'image' => 'legislative'],
    ],

    'event' => [
        'series' => 'SSK Webinar Series',
        'title' => 'Rescue Over Liquidation',
        'subtitle' => 'Practical strategies for saving distressed businesses in Nigeria',
        'date' => '2026-11-11 12:00',
        'label' => 'Wed 11 Nov · 12:00 WAT · Zoom',
        'url' => 'https://sskohn.com/events/',
    ],

    'footer_links' => [
        'FAQs' => 'https://sskohn.com/faq/',
        'Events' => 'https://sskohn.com/events/',
        'Op-Eds' => 'https://sskohn.com/op-eds/',
        'Careers' => 'https://sskohn.com/careers/',
        'CSR' => 'https://sskohn.com/csr/',
        'Terms' => 'https://sskohn.com/website-terms-of-use/',
        'Privacy' => 'https://sskohn.com/privacy-policy-2/',
    ],
];
