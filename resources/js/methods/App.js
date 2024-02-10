export default{

    appendUserToStore(data, jsonParse = true){

        let appData

        if(jsonParse) {
            appData = JSON.parse(data)
        } else {
            appData = data
        }


        let userData = appData.user

        let store = this.$store.state.data.app

        // let StoreArticle = this.$store.state.schemas.addArticle

        let userStore = store.user.data

        if(_.has(appData, 'user') == true && appData.user != null){

            for(let key in appData.user){

                if(userStore[key] != undefined){

                    userStore[key] = userData[key]

                }

            }

            store.user.auth = true

        }

        // if(_.has(appData, 'interests') == true && appData.interests != null){
        //
        //     let inputsInteres = []
        //
        //     let input = store.interests.steps[0].inputs
        //
        //     for(let interes in appData.interests){
        //         let checkValue = false
        //         let item = appData.interests[interes]
        //
        //         if(_.has(appData, 'user') == true && appData.user != null){
        //             let user = appData.user
        //
        //             if(user.new == false){
        //                 if(_.has(user, 'userInterests') == true && user.userInterests != null){
        //                     for(let key in user.userInterests){
        //                         let ids = user.userInterests[key].name.split('_')
        //                         if(item['id'] == ids[ids.length-1]){
        //                             checkValue = true
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //
        //         inputsInteres.push({
        //
        //             inputType: 'checkbox',
        //
        //             checkboxBefore: '/image/svg/sprite.svg#checkboxBefore',
        //
        //             checkboxAfter: '/image/svg/sprite.svg#checkboxAfter',
        //
        //             value: checkValue,
        //
        //             type: 'checkbox',
        //
        //             text: item.value,
        //
        //             id: item.id,
        //
        //             name: 'interes_id_' + item.id
        //         })
        //
        //     }
        //
        //     input.push(...inputsInteres)
        //
        //     store.countNishes = _.size(appData.interests)
        //
        // }
        //
        // if(_.has(appData, 'notifications') == true && appData.notifications != null){
        //     this.$store.commit('updateNotifications', appData.notifications)
        // }
        //
        // if(_.has(appData, 'comments') == true && appData.comments != null){
        //     this.$store.commit('updateComments', appData.comments)
        // }
        //
        // if(_.has(appData, 'countComm') == true && appData.countComm != null){
        //     store.countComm = appData.countComm
        // }
        //
        // if(_.has(appData, 'user_articles') == true && appData.user_articles != null){
        //     store.author_articles = appData.user_articles
        // }
        //
        // // if(_.has(appData, 'article') == true && appData.article != null ){
        // //     for(let key in appData.article){
        // //
        // //     }
        // // }
        //
        // if(_.has(appData, 'language') == true && appData.language != null){
        //     for(let key in appData.language){
        //         store.language[key] = appData.language[key]
        //     }
        // }
        //
        // if(_.has(appData, 'refurl') == true && appData.refurl != null){
        //     this.$store.commit('updateReferalLink', appData.refurl)
        // }
        //
        // if(_.has(appData, 'articles') == true && appData.articles != null){
        //
        //     store.articles = appData.articles
        //
        // }
        //
        // if(_.has(appData, 'courses') == true && appData.courses !=null){
        //
        //     store.courses = appData.courses
        //
        // }
        //
        // if(_.has(appData, 'user_detail') == true && appData.user_detail != null){
        //     for(let key in appData.user_detail){
        //         store.user_detail[key] = appData.user_detail[key]
        //     }
        //     if(_.has(appData, 'isSubscribe') == true && appData.isSubscribe != null){
        //         store.user_detail['isSubscribe'] = appData.isSubscribe
        //     }
        // }
        //
        // if(_.has(appData, 'countries') == true && appData.countries != null){
        //     for(let key in appData.countries){
        //         store.countries[key] = appData.countries[key]
        //     }
        // }
        //
        // if(_.has(appData, 'courseTypes') == true && appData.courseTypes !=null){
        //     for(let key in appData.courseTypes){
        //         store.courseTypes[key] = appData.courseTypes[key]
        //     }
        //
        // }
        // if(_.has(appData, 'courseSubject') == true && appData.courseSubject != null){
        //     for(let key in appData.courseSubject){
        //         store.courseSubject[key] = appData.courseSubject[key]
        //     }
        // }
        //
        // if(_.has(appData, 'articlegroups') == true && appData.articlegroups != null){
        //     this.$store.commit('updateArticleGroups', appData.articlegroups);
        // }
        // if(_.has(appData, 'users') == true && appData.users != null){
        //     this.$store.commit('updateUsers', appData.users);
        // }
        // if(_.has(appData, 'purposeCategories') == true && appData.purposeCategories != null){
        //     this.$store.commit('updatePurposeCategories', appData.purposeCategories)
        // }



    },

}
