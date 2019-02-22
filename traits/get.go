package traits

import (
	"github.com/asaskevich/govalidator"
	"github.com/kataras/iris"
)

type (
	getCycle struct {
		GetBeforeHooks  func()
		GetCustomReturn func(interface{})
	}

	getPost struct {
		Id string `json:"id" valid:"required"`
	}
)

func (c *Traits) getModel(ctx iris.Context) {
	var post getPost
	ctx.ReadJSON(&post)

	if _, err = govalidator.ValidateStruct(post); err != nil {
		c.Failed(ctx, err.Error())
		return
	}

	if c.GetCycle.GetBeforeHooks != nil {
		c.GetCycle.GetBeforeHooks()
	}

	ctx.JSON(iris.Map{})
}
