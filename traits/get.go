package traits

import (
	"github.com/kataras/iris"
)

type (
	getCycle struct {
		GetBeforeHooks  func()
		GetCustomReturn func(interface{})
	}

	getPost struct {
		Id string `json:"id"`
	}
)

func (c *Traits) getModel(ctx iris.Context) {
	var post getPost
	ctx.ReadJSON(&post)

	ctx.JSON(iris.Map{})
}
