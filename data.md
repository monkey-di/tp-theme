
```mermaid
classDiagram
    direction TB
    
    namespace Layer_Pages_Singletons {
        class IB_Page_Main {
            <<Главная страница>>
            -- Блок 1: Баннер --
            +HERO_TITLE: string
            +HERO_BTN_TEXT: string
            +HERO_BTN_LINK: string
            -- Блок 2: О нас --
            +ABOUT_TITLE: string
            +ABOUT_DESC: html
            +ABOUT_BTN_TEXT: string
            +ABOUT_BTN_LINK: string
            +ABOUT_PERSON_IMG: file
            +ABOUT_PERSON_NAME: string
            -- Блок 3: Сборы --
            +FUNDS_TITLE: string
            +FUNDS_DESC: text
            +FUNDS_BTN_TEXT: string
            +FUNDS_MANUAL_LIST: bind<IB_Fundraising>
            %% ТЗ: "выбрать порядок карточек вручную"
            -- Блок 4: Проекты --
            +PROJ_TITLE: string
            +PROJ_BTN_TEXT: string
            +PROJ_BTN_LINK: string
            +PROJ_LIST_TOP: bind<IB_Projects> [Лимит: 2]
            +PROJ_LIST_SLIDER: bind<IB_Projects> [10 шт]
            %% ТЗ: "какие проекты... можно менять"
            -- Блок 5: Новости --
            +NEWS_TITLE: string
            +NEWS_BTN_TEXT: string
            +NEWS_BTN_LINK: string
            %% ТЗ: "сортировка от самой новой" -> Автовывод, привязка не нужна
            -- Блок 7: Сотрудничество --
            +COOP_TITLE: string
            +COOP_DESC: text
            +COOP_BTN_TEXT: string
            -- Блок 8: Партнеры --
            +PARTNERS_TITLE: string
            +PARTNERS_LIST: bind<IB_Partners>
        }

        class IB_Page_About {
            <<О фонде>>
            -- Интро --
            +INTRO_TITLE: string
            +INTRO_MISSION: text
            +INTRO_IMG: file
            -- Цифры (Блок 3) --
            +STATS_TITLE: string
            +STATS_LABEL_MONTH: string
            +STATS_LABEL_YEAR: string
            +STATS_LABEL_TOTAL: string
            -- Настройки блоков --
            +VALUES_TITLE: string
            +HISTORY_TITLE: string
            +AWARDS_TITLE: string
            +TEAM_TITLE: string
            +AMBASS_TITLE: string
            +AMBASS_DESC: text
            -- Контакты --
            +CONTACT_FOUNDER: bind<IB_Team>
            +CONTACT_DIRECTOR: bind<IB_Team>
            +SHOW_WHATSAPP: bool
        }
    }

```